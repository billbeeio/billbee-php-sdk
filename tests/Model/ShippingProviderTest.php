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

use BillbeeDe\BillbeeAPI\Model\ShippingProduct;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShippingProviderTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getShippingProvider();
        self::assertSerialize('Model/shipping_provider.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/shipping_provider.json',
            ShippingProvider::class,
            function (ShippingProvider $result) {
                self::assertEquals(100000000022240, $result->getId());
                self::assertEquals("My provider", $result->getName());
                self::assertCount(1, $result->getProducts());
                self::assertInstanceOf(ShippingProduct::class, $result->getProducts()[0]);
            }
        );
    }

    public static function getShippingProvider(): ShippingProvider
    {
        return (new ShippingProvider())
            ->setId(100000000022240)
            ->setName("My provider")
            ->setProducts([ShippingProductTest::getShippingProduct()]);
    }
}
