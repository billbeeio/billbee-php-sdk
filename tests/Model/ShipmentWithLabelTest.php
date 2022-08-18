<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\ShipmentWithLabel;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShipmentWithLabelTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getShipmentWithLabel();
        self::assertSerialize('Model/shipment_with_label.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/shipment_with_label.json',
            ShipmentWithLabel::class,
            function (ShipmentWithLabel $result) {
                self::assertEquals(1234, $result->getOrderId());
                self::assertEquals(1, $result->getProviderId());
                self::assertEquals(2, $result->getProductId());
                self::assertEquals(true, $result->getChangeStateToSend());
                self::assertEquals("PrinterName", $result->getPrinterName());
                self::assertEquals(100, $result->getWeightInGram());
                self::assertEquals("2022-07-22T00:00:00+00:00", $result->getShipDate()->format('c'));
                self::assertEquals("ClientReference", $result->getClientReference());
            }
        );
    }

    public static function getShipmentWithLabel(): ShipmentWithLabel
    {
        return (new ShipmentWithLabel())
            ->setOrderId(1234)
            ->setProviderId(1)
            ->setProductId(2)
            ->setChangeStateToSend(true)
            ->setPrinterName("PrinterName")
            ->setWeightInGram(100)
            ->setShipDate(new \DateTime("2022-07-22T00:00:00+00:00"))
            ->setClientReference("ClientReference")
            ->setDimension(DimensionsTest::getDimensions());
    }
}
