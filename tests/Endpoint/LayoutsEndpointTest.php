<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\LayoutsEndpoint;
use BillbeeDe\BillbeeAPI\Response\GetLayoutsResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class LayoutsEndpointTest extends TestCase
{
    /** @var LayoutsEndpoint */
    private $endpoint;

    /** @var TestClient */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new LayoutsEndpoint($this->client);
    }

    public function testGetLayouts()
    {
        $this->endpoint->getLayouts();

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('layouts', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetLayoutsResponse::class, $class);
    }
}
