<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\BillbeeAPI\Response\GetShippingProvidersResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\ShippingProviderTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetShippingProvidersResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetShippingProvidersResponse();
        self::assertSerialize('Response/get_shipping_providers_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_shipping_providers_response.json',
            GetShippingProvidersResponse::class,
            function (GetShippingProvidersResponse $result) {
                self::assertInstanceOf(ShippingProvider::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetShippingProvidersResponse(): GetShippingProvidersResponse
    {
        return (new GetShippingProvidersResponse())
            ->setData([ShippingProviderTest::getShippingProvider()]);
    }
}
