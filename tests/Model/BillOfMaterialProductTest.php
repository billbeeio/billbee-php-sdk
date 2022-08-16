<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\BillOfMaterialProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class BillOfMaterialProductTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new BillOfMaterialProduct();
        $result
            ->setAmount(1)
            ->setArticleId(1234)
            ->setSku("PROD1234");
        self::assertSerialize('Model/bill_of_material_product.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/bill_of_material_product.json',
            BillOfMaterialProduct::class,
            function (BillOfMaterialProduct $result) {
                self::assertEquals(1, $result->getAmount());
                self::assertEquals(1234, $result->getArticleId());
                self::assertEquals("PROD1234", $result->getSku());
            }
        );
    }
}
