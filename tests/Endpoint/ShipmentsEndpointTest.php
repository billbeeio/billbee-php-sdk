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

use BillbeeDe\BillbeeAPI\Endpoint\ShipmentsEndpoint;
use BillbeeDe\BillbeeAPI\Model\ShipmentWithLabel;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\BillbeeAPI\Response\ShipWithLabelResponse;
use BillbeeDe\Tests\BillbeeAPI\FakeSerializer;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class ShipmentsEndpointTest extends TestCase
{
    /** @var ShipmentsEndpoint */
    private $endpoint;

    /** @var TestClient */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new ShipmentsEndpoint($this->client, new FakeSerializer());
    }

    public function testGetShippingProviders()
    {
        $this->endpoint->getShippingProviders();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('shipment/shippingproviders', $node);
        $this->assertSame([], $query);
        $this->assertSame(ShippingProvider::class . '[]', $class);
    }

    public function testShipWithLabel()
    {
        $shipment = new ShipmentWithLabel();

        $this->endpoint->shipWithLabel($shipment);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('shipment/shipwithlabel', $node);
        $this->assertSame($shipment, $data);
        $this->assertSame(ShipWithLabelResponse::class, $class);
    }
}
