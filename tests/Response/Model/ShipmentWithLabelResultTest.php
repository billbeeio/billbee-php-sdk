<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response\Model;

use BillbeeDe\BillbeeAPI\Response\Model\ShipmentWithLabelResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShipmentWithLabelResultTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getShipmentWithLabelResult();
        self::assertSerialize('Response/Model/shipment_with_label_result.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/Model/shipment_with_label_result.json',
            ShipmentWithLabelResult::class,
            function (ShipmentWithLabelResult $result) {
                self::assertEquals(1234, $result->getOrderId());
                self::assertEquals("ref", $result->getOrderReference());
                self::assertEquals("shipping id", $result->getShippingId());
                self::assertEquals("tracking url", $result->getTrackingUrl());
                self::assertEquals("data", $result->getLabelDataPdf());
                self::assertEquals("export docs pdf", $result->getExportDocsPdf());
                self::assertEquals("carrier", $result->getCarrier());
                self::assertEquals("2022-08-10T00:00:00", $result->getShippingDate());
            }
        );
    }

    public static function getShipmentWithLabelResult(): ShipmentWithLabelResult
    {
        return (new ShipmentWithLabelResult())
            ->setOrderId(1234)
            ->setOrderReference("ref")
            ->setShippingId("shipping id")
            ->setTrackingUrl("tracking url")
            ->setLabelDataPdf("data")
            ->setExportDocsPdf("export docs pdf")
            ->setCarrier("carrier")
            ->setShippingDate("2022-08-10T00:00:00");
    }
}
