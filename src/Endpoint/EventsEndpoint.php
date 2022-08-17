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

class EventsEndpoint
{
    /** @var ClientInterface */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get a list of all events optionally filtered by date and / or event type
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @param DateTimeInterface $minDate Start date
     * @param DateTimeInterface $maxDate End date
     * @param array $typeIds An array of event type id's
     * @param int $orderId Filter for specific order id
     *
     * @return Response\GetEventsResponse The events
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getEvents(
        $page = 1,
        $pageSize = 50,
        DateTimeInterface $minDate = null,
        DateTimeInterface $maxDate = null,
        $typeIds = [],
        $orderId = null
    ) {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        if ($minDate !== null) {
            $query['minDate'] = $minDate->format('c');
        }

        if ($maxDate !== null) {
            $query['maxDate'] = $maxDate->format('c');
        }

        if (is_array($typeIds) && count($typeIds) > 0) {
            $query['typeId'] = $typeIds;
        }

        if ($orderId != null) {
            $query['orderId'] = $orderId;
        }

        return $this->client->get(
            'events',
            $query,
            Response\GetEventsResponse::class
        );
    }
}
