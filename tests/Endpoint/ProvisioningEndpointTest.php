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

use BillbeeDe\BillbeeAPI\Endpoint\ProvisioningEndpoint;
use BillbeeDe\BillbeeAPI\Response\GetTermsInfoResponse;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use Exception;
use PHPUnit\Framework\TestCase;

class ProvisioningEndpointTest extends TestCase
{
    /** @var ProvisioningEndpoint() */
    private $endpoint;

    /** @var TestClient */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new ProvisioningEndpoint($this->client);
    }


    /** @throws Exception */
    public function testGetTermsInfo()
    {
        $this->endpoint->getTermsInfo();

        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $query, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('automaticprovision/termsinfo', $node);
        $this->assertSame([], $query);
        $this->assertSame(GetTermsInfoResponse::class, $class);
    }
}
