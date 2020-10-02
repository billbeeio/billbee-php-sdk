<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2020 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\StockCode;
use PHPUnit\Framework\TestCase;

class StockCodeTest extends TestCase
{
    public function testCreateFromStatic()
    {
        /** @var Product $productMock */
        $productMock = $this->createMock(Product::class);
        $productMock->sku = '1244';
        $productMock->stockCode = "12";

        /** @var StockCode $stockCode */
        $stockCode = StockCode::fromProduct($productMock);
        $this->assertSame('1244', $stockCode->sku);
        $this->assertSame("12", $stockCode->stockCode);
    }
}
