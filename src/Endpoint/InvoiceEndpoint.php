<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response as Response;
use DateTimeInterface;
use Exception;
use InvalidArgumentException;

class InvoiceEndpoint
{
    /** @var ClientInterface */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get a list of all invoices
     *
     * @param int $page Specifies the page to request
     * @param int $pageSize Specifies the number of elements per page. Defaults to 50, max value is 250
     * @param ?DateTimeInterface $minInvoiceDate Specifies the oldest invoice date to include
     * @param ?DateTimeInterface $maxInvoiceDate Specifies the newest invoice date to include
     * @param int[] $shopId Specifies a list of shop ids for which invoices should be included
     * @param int[] $orderStateId Specifies a list of state ids to include in the response
     * @param string[] $tag Specifies a list of tags to include in the response
     * @param ?DateTimeInterface $minPayDate Specifies the oldest pay date to include
     * @param ?DateTimeInterface $maxPayDate Specifies the newest pay date to include
     * @param bool $includePositions Specifies to include the positions
     *
     * @return Response\GetInvoicesResponse The Invoices
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getInvoices(
        int $page = 1,
        int $pageSize = 50,
        ?DateTimeInterface $minInvoiceDate = null,
        ?DateTimeInterface $maxInvoiceDate = null,
        array $shopId = [],
        array $orderStateId = [],
        array $tag = [],
        ?DateTimeInterface $minPayDate = null,
        ?DateTimeInterface $maxPayDate = null,
        bool $includePositions = false
    ): ?Response\GetInvoicesResponse {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minInvoiceDate !== null) {
            $query['minInvoiceDate'] = $minInvoiceDate->format('c');
        }

        if ($maxInvoiceDate !== null) {
            $query['maxInvoiceDate'] = $maxInvoiceDate->format('c');
        }

        if (!empty($shopId)) {
            $shopId = array_values(array_filter(array_unique($shopId)));
            foreach ($shopId as $value) {
                if (!is_numeric($value)) {
                    throw new InvalidArgumentException('shopId must be an array of int');
                }
            }
            if (count($shopId) > 0) {
                $query['shopId'] = $shopId;
            }
        }

        if (!empty($orderStateId)) {
            $orderStateId = array_values(array_filter(array_unique($orderStateId)));
            foreach ($orderStateId as $value) {
                if (!is_numeric($value)) {
                    throw new InvalidArgumentException('orderStateId must be an array of int');
                }
            }
            if (count($orderStateId) > 0) {
                $query['orderStateId'] = $orderStateId;
            }
        }

        if (!empty($tag)) {
            $tag = array_values(array_filter(array_unique($tag)));
            if (count($tag) > 0) {
                $query['tag'] = $tag;
            }
        }

        if ($minPayDate !== null) {
            $query['minPayDate'] = $minPayDate->format('c');
        }

        if ($maxPayDate !== null) {
            $query['maxPayDate'] = $maxPayDate->format('c');
        }

        if (is_bool($includePositions) && $includePositions) {
            $query['includePositions'] = 'true';
        }

        return $this->client->get(
            'orders/invoices',
            $query,
            Response\GetInvoicesResponse::class
        );
    }
}
