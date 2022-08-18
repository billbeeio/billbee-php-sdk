<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this stock_code code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\StockCode;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class StockCodeTest extends SerializerTestCase
{
    public function testCreateFromStatic()
    {
        $product = (new Product())
            ->setSku('1244')
            ->setStockCode("12");

        /** @var StockCode $stockCode */
        $stockCode = StockCode::fromProduct($product);
        $this->assertSame('1244', $stockCode->getSku());
        $this->assertSame("12", $stockCode->getStockCode());
    }

    public function testSerialize(): void
    {
        $result = self::getStockCode();
        self::assertSerialize('Model/stock_code.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/stock_code.json',
            StockCode::class,
            function (StockCode $result) {
                self::assertEquals("test", $result->getSku());
                self::assertEquals(1234, $result->getStockId());
                self::assertEquals("1234", $result->getStockCode());
            }
        );
    }

    public static function getStockCode(): StockCode
    {
        return (new StockCode())
            ->setSku("test")
            ->setStockId(1234)
            ->setStockCode("1234");
    }
}
