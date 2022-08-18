<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Customer;
use BillbeeDe\BillbeeAPI\Response\GetCustomerResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomerTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCustomerResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetCustomerResponse();
        self::assertSerialize('Response/get_customer_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_customer_response.json',
            GetCustomerResponse::class,
            function (GetCustomerResponse $result) {
                self::assertInstanceOf(Customer::class, $result->getData());
            }
        );
    }

    public static function getGetCustomerResponse(): GetCustomerResponse
    {
        return (new GetCustomerResponse())
            ->setData(CustomerTest::getCustomer());
    }
}
