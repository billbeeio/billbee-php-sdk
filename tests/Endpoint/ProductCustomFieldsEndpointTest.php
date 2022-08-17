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

namespace BillbeeDe\Tests\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\Endpoint\ProductCustomFieldsEndpoint;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Response\GetCustomFieldDefinitionResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomFieldDefinitionsResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class ProductCustomFieldsEndpointTest extends TestCase
{
    /** @var ProductCustomFieldsEndpoint */
    private $endpoint;

    /** @var TestClient */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new ProductCustomFieldsEndpoint($this->client);
    }

    public function testGetCustomFieldDefinitions()
    {
        $this->endpoint->getCustomFieldDefinitions(4, 100);

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products/custom-fields', $node);
        $this->assertSame([
            'page' => 4,
            'pageSize' => 100,
        ], $query);
        $this->assertSame(GetCustomFieldDefinitionsResponse::class, $class);
    }

    public function testGetCustomFieldDefinitionFailsInvalidId()
    {
        $this->expectException(InvalidIdException::class);
        $this->endpoint->getCustomFieldDefinition('1234b3x');
    }

    public function testGetCustomFieldDefinition()
    {
        $this->endpoint->getCustomFieldDefinition(200);

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('products/custom-fields/200', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetCustomFieldDefinitionResponse::class, $class);
    }
}
