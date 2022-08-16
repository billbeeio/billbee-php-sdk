<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CreateCustomerRequest;
use BillbeeDe\BillbeeAPI\Model\CustomerAddress;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CreateCustomerRequestTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new CreateCustomerRequest();
        $address = new CustomerAddress();
        $result->setAddress($address);
        self::assertSerialize('Model/create_customer_request.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/create_customer_request.json',
            CreateCustomerRequest::class,
            function (CreateCustomerRequest $result) {
                self::assertInstanceOf(CustomerAddress::class, $result->getAddress());
            }
        );
    }
}
