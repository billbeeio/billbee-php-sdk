<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\PartnerOrder;
use BillbeeDe\BillbeeAPI\Response\GetOrderByPartnerResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\PartnerOrderTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetOrderByPartnerResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetOrderByPartnerResponse();
        self::assertSerialize('Response/get_order_by_partner_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_order_by_partner_response.json',
            GetOrderByPartnerResponse::class,
            function (GetOrderByPartnerResponse $result) {
                self::assertInstanceOf(PartnerOrder::class, $result->getData());
            }
        );
    }

    public static function getGetOrderByPartnerResponse(): GetOrderByPartnerResponse
    {
        return (new GetOrderByPartnerResponse())
            ->setData(PartnerOrderTest::getPartnerOrder());
    }
}
