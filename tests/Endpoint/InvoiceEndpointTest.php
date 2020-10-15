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

use BillbeeDe\BillbeeAPI\Endpoint\InvoiceEndpoint;
use BillbeeDe\BillbeeAPI\Response\GetInvoicesResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use DateTime;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class InvoiceEndpointTest extends TestCase
{
    /** @var InvoiceEndpoint() */
    private $endpoint;

    /** @var TestClient */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new InvoiceEndpoint($this->client);
    }

    public function testGetInvoicesFailsInvalidShopId()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('shopId must be an array of int');
        $this->endpoint->getInvoices(1, 50, null, null, ['test']);
    }

    public function testGetInvoicesFailsInvalidOrderStateId()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('orderStateId must be an array of int');
        $this->endpoint->getInvoices(1, 50, null, null, [], ['test']);
    }

    public function testGetInvoices()
    {
        $this->endpoint->getInvoices();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders/invoices', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 50,
        ], $data);
        $this->assertSame(GetInvoicesResponse::class, $class);
    }

    public function testGetInvoicesAdvanced()
    {
        $this->endpoint->getInvoices(
            12,
            24,
            new DateTime('2020-01-01T00:00:00'),
            new DateTime('2020-12-31T00:00:00'),
            [1, 233, 1],
            [1, 2, 3, 4, 4],
            ['test', 'test', 'test1'],
            new DateTime('2020-01-01T01:00:00'),
            new DateTime('2020-12-31T01:00:00'),
            true
        );
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('orders/invoices', $node);
        $this->assertSame([
            'page' => 12,
            'pageSize' => 24,
            'minInvoiceDate' => '2020-01-01T00:00:00+00:00',
            'maxInvoiceDate' => '2020-12-31T00:00:00+00:00',
            'shopId' => [1, 233],
            'orderStateId' => [1, 2, 3, 4],
            'tag' => ['test', 'test1'],
            'minPayDate' => '2020-01-01T01:00:00+00:00',
            'maxPayDate' => '2020-12-31T01:00:00+00:00',
            'includePositions' => 'true',
        ], $data);
        $this->assertSame(GetInvoicesResponse::class, $class);
    }
}
