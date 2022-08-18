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

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\Stock;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class StockTest extends SerializerTestCase
{
    public function testConstruct()
    {
        $stock = new Stock('asdf', 12.33);
        $this->assertInstanceOf(Stock::class, $stock);
        $this->assertSame('asdf', $stock->getSku());
        $this->assertSame(12.33, $stock->getOldQuantity());
        $this->assertSame(12.33, $stock->getNewQuantity());
        $this->assertSame(0.00, $stock->getDeltaQuantity());
        $this->assertSame(false, $stock->getAutosubtractReservedAmount());
    }

    public function testCreateFromProduct()
    {
        $product = (new Product())
            ->setSku('12AA')
            ->setStockCurrent(133.0);

        $stock = Stock::fromProduct($product);
        $this->assertInstanceOf(Stock::class, $stock);
        $this->assertSame('12AA', $stock->getSku());
        $this->assertSame(133.0, $stock->getOldQuantity());
        $this->assertSame(133.0, $stock->getNewQuantity());
        $this->assertSame(0.0, $stock->getDeltaQuantity());
    }

    public function testGetSetSku()
    {
        $stock = new Stock('asdf', 12.33);
        $this->assertSame('asdf', $stock->getSku());
        $stock->setSku('foobar');
        $this->assertSame('foobar', $stock->getSku());
    }

    public function testGetSetStockId()
    {
        $stock = new Stock('asdf', 12.33);
        $this->assertSame(null, $stock->getStockId());
        $stock->setStockId(112);
        $this->assertSame(112, $stock->getStockId());
    }

    public function testGetSetReason()
    {
        $stock = new Stock('asdf', 12.33);
        $this->assertSame(null, $stock->getReason());
        $stock->setReason('Import');
        $this->assertSame('Import', $stock->getReason());
    }

    public function testGetSetAutosubtractReservedAmount()
    {
        $stock = new Stock('asdf', 12.33);
        $this->assertSame(false, $stock->getAutosubtractReservedAmount());
        $stock->setAutosubtractReservedAmount(true);
        $this->assertTrue($stock->getAutosubtractReservedAmount());
    }

    public function testGetSetOldQuantity()
    {
        $stock = new Stock('asdf', 12.33);
        $this->assertSame(12.33, $stock->getOldQuantity());
        $this->assertSame(12.33, $stock->getNewQuantity());
        $this->assertSame(0.00, $stock->getDeltaQuantity());

        $stock->setOldQuantity(4);
        $this->assertSame(4.0, $stock->getOldQuantity());
        $this->assertSame(12.33, $stock->getNewQuantity());
        $this->assertSame(-8.33, $stock->getDeltaQuantity());
    }

    public function testGetSetNewQuantity()
    {
        $stock = new Stock('asdf', 12.33);
        $this->assertSame(12.33, $stock->getOldQuantity());
        $this->assertSame(12.33, $stock->getNewQuantity());
        $this->assertSame(0.00, $stock->getDeltaQuantity());

        $stock->setNewQuantity(4);
        $this->assertSame(12.33, $stock->getOldQuantity());
        $this->assertSame(4.0, $stock->getNewQuantity());
        $this->assertSame(8.33, $stock->getDeltaQuantity());
    }

    public function testGetSetDeltaQuantity()
    {
        $stock = new Stock('asdf', 12.33);
        $this->assertSame(12.33, $stock->getOldQuantity());
        $this->assertSame(12.33, $stock->getNewQuantity());
        $this->assertSame(0.00, $stock->getDeltaQuantity());

        $stock->setDeltaQuantity(-4);
        $this->assertSame(12.33, $stock->getOldQuantity());
        $this->assertSame(8.33, $stock->getNewQuantity());
        $this->assertSame(-4.0, $stock->getDeltaQuantity());
    }

    public function testSerialize(): void
    {
        $result = self::getStock();
        self::assertSerialize('Model/stock.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/stock.json',
            Stock::class,
            function (Stock $result) {
                self::assertEquals("foobar", $result->getSku());
                self::assertEquals("Import", $result->getReason());
                self::assertEquals(12.33, $result->getOldQuantity());
                self::assertEquals(19.66, $result->getNewQuantity());
                self::assertEquals(7.33, $result->getDeltaQuantity());
                self::assertEquals(true, $result->getAutosubtractReservedAmount());
            }
        );
    }

    public static function getStock(): Stock
    {
        return (new Stock())
            ->setSku("foobar")
            ->setReason("Import")
            ->setOldQuantity(12.33)
            ->setNewQuantity(19.66)
            ->setDeltaQuantity(7.33)
            ->setAutosubtractReservedAmount(true);
    }
}
