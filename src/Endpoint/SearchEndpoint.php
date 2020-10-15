<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2020 by Billbee GmbH
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
use BillbeeDe\BillbeeAPI\Type as Type;

class SearchEndpoint
{
    /** @var ClientInterface */
    private $client;


    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Search for products, customers and orders. Type can be "order", "product" and / or "customer"
     * Term can contains lucene query syntax
     *
     * @param string $term The search string
     * @param string[] $type The data types which should be searched for the search string
     * @param int $searchMode The Search mode
     *
     * @return Response\SearchDataResponse
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     */
    public function search(
        $term,
        $type = [
            Type\SearchType::PRODUCT,
            Type\SearchType::ORDER,
            Type\SearchType::CUSTOMER,
        ],
        $searchMode = Type\SearchMode::_EXPERT
    ) {
        return $this->client->post(
            'search',
            [
                'Type' => $type,
                'Term' => $term,
                'SearchMode' => $searchMode,
            ],
            Response\SearchDataResponse::class
        );
    }
}
