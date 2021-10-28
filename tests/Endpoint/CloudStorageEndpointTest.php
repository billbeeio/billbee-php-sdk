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

use BillbeeDe\BillbeeAPI\Endpoint\CloudStorageEndpoint;
use BillbeeDe\BillbeeAPI\Response\GetCloudStoragesResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class CloudStorageEndpointTest extends TestCase
{
    /** @var CloudStorageEndpoint() */
    private $endpoint;

    /** @var TestClient */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new CloudStorageEndpoint($this->client);
    }

    public function testGetCloudStorages()
    {
        $this->endpoint->getCloudStorages();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('cloudstorages', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetCloudStoragesResponse::class, $class);
    }
}
