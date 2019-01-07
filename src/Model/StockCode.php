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

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class StockCode
{
    /**
     * The SKU of the Product
     * @var string
     *
     * @DataField(name="Sku", type="string")
     */
    public $sku;

    /**
     * The Id of the stock
     * @var int
     *
     * @DataField(name="StockId", type="int")
     */
    public $stockId = null;

    /**
     * The stock code
     * @var string
     *
     * @DataField(name="StockCode", type="string")
     */
    public $stockCode;

    public static function fromProduct(Product $product)
    {
        $stockCode = new StockCode();
        $stockCode->sku = $product->sku;
        $stockCode->stockCode = $product->stockCode;
        return $stockCode;
    }
}
