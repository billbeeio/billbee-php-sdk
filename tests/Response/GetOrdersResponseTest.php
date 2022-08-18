<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Response\GetOrdersResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\OrderTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetOrdersResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetOrdersResponse();
        self::assertSerialize('Response/get_orders_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_orders_response.json',
            GetOrdersResponse::class,
            function (GetOrdersResponse $result) {
                self::assertInstanceOf(Order::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetOrdersResponse(): GetOrdersResponse
    {
        return (new GetOrdersResponse())
            ->setData([OrderTest::getOrder()]);
    }
}
