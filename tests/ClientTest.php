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

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Client;
use BillbeeDe\BillbeeAPI\ClientInterface;
use Exception;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ClientTest extends TestCase
{
    private $client;

    protected function setUp()
    {
        if ($this->client === null) {
            $this->client = new Client('Hello', 'World', '12344');
        }
    }

    /** @throws Exception */
    public function testConstruct()
    {
        $this->assertInstanceOf(ClientInterface::class, $this->client);
    }

    /** @throws Exception */
    public function testBatchRequests()
    {
        $this->assertFalse($this->client->isBatchModeEnabled());
        $this->client->enableBatchMode();
        $this->assertTrue($this->client->isBatchModeEnabled());
        $this->assertEquals(0, $this->client->getPoolSize());
        $this->assertNull($this->client->products()->getProducts(1, 1));
        $this->assertEquals(1, $this->client->getPoolSize());
        $this->assertNull($this->client->orders()->getOrders(1, 1));
        $this->assertNull($this->client->events()->getEvents(3, 1));
        $this->assertEquals(3, $this->client->getPoolSize());
        $this->assertNull($this->client->provisioning()->getTermsInfo());
        $this->assertNull($this->client->invoices()->getInvoices());
        $this->assertNull($this->client->shipments()->getShippingProviders());
        $this->assertNull($this->client->productCustomFields()->getCustomFieldDefinitions());
        $this->assertNull($this->client->webHooks()->getWebHooks());
        $this->assertNull($this->client->customers()->getCustomers());
        $this->assertNull($this->client->cloudStorages()->getCloudStorages());
        $this->assertNull($this->client->layouts()->getLayouts());
        $this->assertNull($this->client->search()->search('Hello World'));
        $this->assertEquals(12, $this->client->getPoolSize());

        $this->assertTrue($this->client->isBatchModeEnabled());
        $this->client->disableBatchMode();
        $this->assertFalse($this->client->isBatchModeEnabled());
    }

    /** @throws Exception */
    public function testGetSetLogger()
    {
        $this->assertInstanceOf(LoggerInterface::class, $this->client->getLogger());
        $this->assertInstanceOf(NullLogger::class, $this->client->getLogger());

        $this->client->setLogger(new EchoLogger());
        $this->assertInstanceOf(LoggerInterface::class, $this->client->getLogger());
        $this->assertInstanceOf(EchoLogger::class, $this->client->getLogger());

        $this->client->setLogger();
        $this->assertInstanceOf(LoggerInterface::class, $this->client->getLogger());
        $this->assertInstanceOf(NullLogger::class, $this->client->getLogger());

        $this->client->setLogger(null);
        $this->assertInstanceOf(LoggerInterface::class, $this->client->getLogger());
        $this->assertInstanceOf(NullLogger::class, $this->client->getLogger());
    }

    /** @throws Exception */
    public function testGetSetLogRequests()
    {
        $this->assertFalse($this->client->getLogRequests());
        $this->client->setLogRequests(true);
        $this->assertTrue($this->client->getLogRequests());
        $this->client->setLogRequests(false);
        $this->assertFalse($this->client->getLogRequests());
    }
}
