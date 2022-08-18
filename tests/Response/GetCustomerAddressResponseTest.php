<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\CustomerAddress;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomerAddressTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCustomerAddressResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetCustomerAddressResponse();
        self::assertSerialize('Response/get_customer_address_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_customer_address_response.json',
            GetCustomerAddressResponse::class,
            function (GetCustomerAddressResponse $result) {
                self::assertInstanceOf(CustomerAddress::class, $result->getData());
            }
        );
    }

    public static function getGetCustomerAddressResponse(): GetCustomerAddressResponse
    {
        return (new GetCustomerAddressResponse())
            ->setData(CustomerAddressTest::getCustomerAddress());
    }
}
