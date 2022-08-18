<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Customer;
use BillbeeDe\BillbeeAPI\Response\GetCustomersResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomerTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCustomersResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetCustomersResponse();
        self::assertSerialize('Response/get_customers_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_customers_response.json',
            GetCustomersResponse::class,
            function (GetCustomersResponse $result) {
                self::assertInstanceOf(Customer::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetCustomersResponse(): GetCustomersResponse
    {
        return (new GetCustomersResponse())
            ->setData([CustomerTest::getCustomer()]);
    }
}
