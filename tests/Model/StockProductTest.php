<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\StockProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class StockProductTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getStockProduct();
        self::assertSerialize('Model/stock_product.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/stock_product.json',
            StockProduct::class,
            function (StockProduct $result) {
                self::assertEquals("Lager 1", $result->getName());
                self::assertEquals(266.0, $result->getStockId());
                self::assertEquals(0.0, $result->getStockCurrent());
                self::assertEquals(0.0, $result->getStockWarning());
                self::assertEquals("test", $result->getStockCode());
                self::assertEquals(0.0, $result->getUnfulfilledAmount());
                self::assertEquals(0.0, $result->getStockDesired());
            }
        );
    }

    public static function getStockProduct(): StockProduct
    {
        return (new StockProduct())
            ->setName("Lager 1")
            ->setStockId(266.0)
            ->setStockCurrent(0.0)
            ->setStockWarning(0.0)
            ->setStockCode("test")
            ->setUnfulfilledAmount(0.0)
            ->setStockDesired(0.0)
            ;
    }
}
