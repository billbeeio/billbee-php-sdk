<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\Model\ShipmentWithLabelResult;
use BillbeeDe\BillbeeAPI\Response\ShipWithLabelResponse;
use BillbeeDe\Tests\BillbeeAPI\Response\Model\ShipmentWithLabelResultTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShipWithLabelResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getShipWithLabelResponse();
        self::assertSerialize('Response/ship_with_label_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/ship_with_label_response.json',
            ShipWithLabelResponse::class,
            function (ShipWithLabelResponse $result) {
                self::assertInstanceOf(ShipmentWithLabelResult::class, $result->getData());
            }
        );
    }

    public static function getShipWithLabelResponse(): ShipWithLabelResponse
    {
        return (new ShipWithLabelResponse())
            ->setData(ShipmentWithLabelResultTest::getShipmentWithLabelResult());
    }
}
