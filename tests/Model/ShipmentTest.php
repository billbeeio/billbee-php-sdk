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

use BillbeeDe\BillbeeAPI\Model\Shipment;
use BillbeeDe\BillbeeAPI\Model\ShippingProduct;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShipmentTest extends SerializerTestCase
{
    public function testCreateFromProviderAndProduct()
    {
        $provider = (new ShippingProvider())
            ->setId(4711);

        $product = (new ShippingProduct())
            ->setId(1337);

        $shipment = Shipment::fromProviderAndProduct($provider, $product);
        $this->assertSame(4711, $shipment->getShippingProviderId());
        $this->assertSame(1337, $shipment->getShippingProductId());
    }

    public function testSerialize(): void
    {
        $result = self::getShipment();
        self::assertSerialize('Model/shipment.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/shipment.json',
            Shipment::class,
            function (Shipment $result) {
                self::assertEquals("ShippingId", $result->getShippingId());
                self::assertEquals("OrderId", $result->getOrderId());
                self::assertEquals("OrderCommentId", $result->getComment());
                self::assertEquals(1, $result->getShippingProviderId());
                self::assertEquals(2, $result->getShippingProductId());
                self::assertEquals(3, $result->getShippingCarrier());
                self::assertEquals(1, $result->getShipmentType());
            }
        );
    }

    public static function getShipment(): Shipment
    {
        return (new Shipment())
            ->setShippingId("ShippingId")
            ->setOrderId("OrderId")
            ->setComment("OrderCommentId")
            ->setShippingProviderId(1)
            ->setShippingProductId(2)
            ->setShippingCarrier(3)
            ->setShipmentType(1);
    }
}
