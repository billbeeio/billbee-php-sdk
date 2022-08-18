<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\SoldProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class SoldProductTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new SoldProduct();
        $result
            ->setOldId("4321")
            ->setId("1234")
            ->setTitle("Test Bestandsabgleich")
            ->setWeight(500)
            ->setSKU("TESTBESTAND")
            ->setSkuOrId("TESTBESTAND")
            ->setIsDigital(true)
            ->setEAN("testejcz")
            ->setTaric("1234")
            ->setCountryOfOrigin("AX")
            ->setBillbeeId(100000058592683);
        self::assertSerialize('Model/sold_product.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/sold_product.json',
            SoldProduct::class,
            function (SoldProduct $result) {
                self::assertEquals("4321", $result->getOldId());
                self::assertEquals("1234", $result->getId());
                self::assertEquals("Test Bestandsabgleich", $result->getTitle());
                self::assertEquals(500, $result->getWeight());
                self::assertEquals("TESTBESTAND", $result->getSKU());
                self::assertEquals("TESTBESTAND", $result->getSkuOrId());
                self::assertEquals(true, $result->getIsDigital());
                self::assertEquals("testejcz", $result->getEAN());
                self::assertEquals("1234", $result->getTaric());
                self::assertEquals("AX", $result->getCountryOfOrigin());
                self::assertEquals(100000058592683, $result->getBillbeeId());
            }
        );
    }
}
