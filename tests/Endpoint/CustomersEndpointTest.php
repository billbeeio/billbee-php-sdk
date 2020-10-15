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

use BillbeeDe\BillbeeAPI\Endpoint\CustomersEndpoint;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Model\CreateCustomerRequest;
use BillbeeDe\BillbeeAPI\Model\Customer;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressesResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomerResponse;
use BillbeeDe\BillbeeAPI\Response\GetCustomersResponse;
use BillbeeDe\BillbeeAPI\Response\GetOrdersResponse;
use BillbeeDe\Tests\BillbeeAPI\FakeSerializer;
use BillbeeDe\Tests\BillbeeAPI\TestClient;
use PHPUnit\Framework\TestCase;

class CustomersEndpointTest extends TestCase
{

    /** @var CustomersEndpoint) */
    private $endpoint;

    /** @var TestClient */
    private $client;

    protected function setUp(): void
    {
        $this->client = new TestClient();
        $this->endpoint = new CustomersEndpoint($this->client, new FakeSerializer());
    }

    public function testGetCustomers()
    {
        $this->endpoint->getCustomers();
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetCustomersResponse::class, $class);
    }

    public function testGetCustomerFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->endpoint->getCustomer(-1);
    }

    public function testGetCustomerFailsNonNumericId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->endpoint->getCustomer('test');
    }

    public function testGetCustomer()
    {
        $this->endpoint->getCustomer(123);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetCustomerResponse::class, $class);
    }

    public function testGetCustomerAddressesFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->endpoint->getCustomerAddresses(-1);
    }

    public function testGetCustomerAddressesFailsNonNumericId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->endpoint->getCustomerAddresses('test');
    }

    public function testGetCustomerAddresses()
    {
        $this->endpoint->getCustomerAddresses(123);
        $this->endpoint->getCustomerAddresses(123, -1, 2);
        $this->endpoint->getCustomerAddresses(123, 2, -1);
        $this->endpoint->getCustomerAddresses(123, -1, -1);
        $this->endpoint->getCustomerAddresses(123, 5, 5);

        $requests = $this->client->getRequests();
        $this->assertCount(5, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/addresses', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 50,
        ], $data);
        $this->assertSame(GetCustomerAddressesResponse::class, $class);

        list($method, $node, $data, $class) = $requests[1];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/addresses', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 2,
        ], $data);
        $this->assertSame(GetCustomerAddressesResponse::class, $class);

        list($method, $node, $data, $class) = $requests[2];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/addresses', $node);
        $this->assertSame([
            'page' => 2,
            'pageSize' => 1,
        ], $data);
        $this->assertSame(GetCustomerAddressesResponse::class, $class);

        list($method, $node, $data, $class) = $requests[3];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/addresses', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 1,
        ], $data);
        $this->assertSame(GetCustomerAddressesResponse::class, $class);

        list($method, $node, $data, $class) = $requests[4];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/addresses', $node);
        $this->assertSame([
            'page' => 5,
            'pageSize' => 5,
        ], $data);
        $this->assertSame(GetCustomerAddressesResponse::class, $class);
    }

    public function testGetCustomerAddressFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->endpoint->getCustomerAddress(-1);
    }

    public function testGetCustomerAddressFailsNonNumericId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->endpoint->getCustomerAddress('test');
    }

    public function testGetCustomerAddress()
    {
        $this->endpoint->getCustomerAddress(123);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/addresses/123', $node);
        $this->assertSame([], $data);
        $this->assertSame(GetCustomerAddressResponse::class, $class);
    }


    public function testGetCustomerOrdersFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->endpoint->getCustomerOrders(-1);
    }

    public function testGetCustomerOrdersFailsNonNumericId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $this->endpoint->getCustomerOrders('test');
    }

    public function testGetCustomerOrders()
    {
        $this->endpoint->getCustomerOrders(123);
        $this->endpoint->getCustomerOrders(123, -1, 2);
        $this->endpoint->getCustomerOrders(123, 2, -1);
        $this->endpoint->getCustomerOrders(123, -1, -1);
        $this->endpoint->getCustomerOrders(123, 5, 5);
        $requests = $this->client->getRequests();
        $this->assertCount(5, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/orders', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 50,
        ], $data);
        $this->assertSame(GetOrdersResponse::class, $class);

        list($method, $node, $data, $class) = $requests[1];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/orders', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 2,
        ], $data);
        $this->assertSame(GetOrdersResponse::class, $class);

        list($method, $node, $data, $class) = $requests[2];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/orders', $node);
        $this->assertSame([
            'page' => 2,
            'pageSize' => 1,
        ], $data);
        $this->assertSame(GetOrdersResponse::class, $class);

        list($method, $node, $data, $class) = $requests[3];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/orders', $node);
        $this->assertSame([
            'page' => 1,
            'pageSize' => 1,
        ], $data);
        $this->assertSame(GetOrdersResponse::class, $class);

        list($method, $node, $data, $class) = $requests[4];
        $this->assertSame('GET', $method);
        $this->assertSame('customers/123/orders', $node);
        $this->assertSame([
            'page' => 5,
            'pageSize' => 5,
        ], $data);
        $this->assertSame(GetOrdersResponse::class, $class);
    }


    public function testUpdateCustomerFailsNegativeId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $customer = new Customer();
        $customer->id = -1;
        $this->endpoint->updateCustomer($customer);
    }

    public function testUpdateCustomerFailsNonNumericId()
    {
        $this->expectException(InvalidIdException::class);
        $this->expectExceptionMessage('Id must be an instance of integer and positive');
        $customer = new Customer();
        $customer->id = 'test';
        $this->endpoint->updateCustomer($customer);
    }

    public function testUpdateCustomer()
    {
        $customer = new Customer();
        $customer->id = 123;
        $this->endpoint->updateCustomer($customer);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('PUT', $method);
        $this->assertSame('customers/123', $node);
        $this->assertSame($customer, $data);
        $this->assertSame(GetCustomerResponse::class, $class);
    }

    public function testCreateCustomer()
    {
        $request = new CreateCustomerRequest();

        $this->endpoint->createCustomer($request);
        $requests = $this->client->getRequests();
        $this->assertCount(1, $requests);

        list($method, $node, $data, $class) = $requests[0];
        $this->assertSame('POST', $method);
        $this->assertSame('customers', $node);
        $this->assertSame('{"address":null,"id":null,"name":null,"email":null,"tel1":null,"tel2":null,"number":null,"priceGroupId":null,"languageId":null,"vatId":null}', $data);
        $this->assertSame(GetCustomerResponse::class, $class);
    }
}
