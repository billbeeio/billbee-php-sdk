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
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ShippingProductTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getShippingProduct();
        self::assertSerialize('Model/shipping_product.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/shipping_product.json',
            ShippingProduct::class,
            function (ShippingProduct $result) {
                self::assertEquals(100000000288647, $result->getId());
                self::assertEquals("Test", $result->getDisplayName());
                self::assertEquals("V01PAK;01", $result->getProductName());
            }
        );
    }

    public static function getShippingProduct(): ShippingProduct
    {
        return (new ShippingProduct())
            ->setId(100000000288647)
            ->setDisplayName("Test")
            ->setProductName("V01PAK;01");
    }
}
