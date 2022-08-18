<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\CustomerAddress;
use BillbeeDe\BillbeeAPI\Response\GetCustomerAddressesResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomerAddressTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCustomerAddressesResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetCustomerAddressesResponse();
        self::assertSerialize('Response/get_customer_addresses_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_customer_addresses_response.json',
            GetCustomerAddressesResponse::class,
            function (GetCustomerAddressesResponse $result) {
                self::assertInstanceOf(CustomerAddress::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetCustomerAddressesResponse(): GetCustomerAddressesResponse
    {
        return (new GetCustomerAddressesResponse())
            ->setData([CustomerAddressTest::getCustomerAddress()]);
    }
}
