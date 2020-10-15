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

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\SearchEndpoint;
use BillbeeDe\BillbeeAPI\Response\SearchDataResponse;
use BillbeeDe\BillbeeAPI\Type\SearchMode;
use BillbeeDe\BillbeeAPI\Type\SearchType;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class SearchEndpointTest extends TestCase
{
    /** @var SearchEndpoint */
    private $endpoint;

    /** @var TestClient */
    private $client;

    protected function setUp()
    {
        $this->client = new TestClient();
        $this->endpoint = new SearchEndpoint($this->client);
    }

    public function testSearch()
    {
        $term = 'Hello World';
        $type = [SearchType::ORDER];
        $searchMode = SearchMode::_SUGGEST;

        $this->endpoint->search($term, $type, $searchMode);

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('search', $node);
        $this->assertSame([
            'Type' => $type,
            'Term' => $term,
            'SearchMode' => $searchMode,
        ], $query);
        $this->assertSame(SearchDataResponse::class, $class);
    }
}
