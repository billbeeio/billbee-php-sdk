<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Response\GetOrderResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\OrderTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetOrderResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetOrderResponse();
        self::assertSerialize('Response/get_order_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_order_response.json',
            GetOrderResponse::class,
            function (GetOrderResponse $result) {
                self::assertInstanceOf(Order::class, $result->getData());
            }
        );
    }

    public static function getGetOrderResponse(): GetOrderResponse
    {
        return (new GetOrderResponse())
            ->setData(OrderTest::getOrder());
    }
}
