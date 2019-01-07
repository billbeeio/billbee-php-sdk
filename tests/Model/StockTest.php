<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\Stock;
use PHPUnit\Framework\TestCase;

class StockTest extends TestCase
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
        /** @var Product $productMock */
        $productMock = $this->createMock(Product::class);
        $productMock->sku = '12AA';
        $productMock->stockCurrent = 133;

        $stock = Stock::fromProduct($productMock);
        $this->assertInstanceOf(Stock::class, $stock);
        $this->assertSame('12AA', $stock->getSku());
        $this->assertSame(133, $stock->getOldQuantity());
        $this->assertSame(133, $stock->getNewQuantity());
        $this->assertSame(0, $stock->getDeltaQuantity());
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
        $this->assertSame(4, $stock->getOldQuantity());
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
        $this->assertSame(4, $stock->getNewQuantity());
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
        $this->assertSame(-4, $stock->getDeltaQuantity());
    }

    public function testJsonSerialize()
    {
        $stock = new Stock('foobar', 12.33);
        $stock
            ->setReason('Import')
            ->setNewQuantity(5)
            ->setAutosubtractReservedAmount(true);

        $expected = '{"Sku":"foobar","Reason":"Import","OldQuantity":12.33,"NewQuantity":5,"DeltaQuantity":7.33,"AutosubtractReservedAmount":true}';
        $this->assertSame($expected, json_encode($stock));

        $stock->setStockId(1);
        $expected = '{"Sku":"foobar","Reason":"Import","OldQuantity":12.33,"NewQuantity":5,"DeltaQuantity":7.33,"AutosubtractReservedAmount":true,"StockId":1}';
        $this->assertSame($expected, json_encode($stock));
    }
}
