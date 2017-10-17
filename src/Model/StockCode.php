<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\JOM\JsonField;

class StockCode
{
    /**
     * The SKU of the Product
     * @var string
     *
     * @JsonField(name="Sku", type="string")
     */
    public $sku;

    /**
     * The Id of the stock
     * @var int
     *
     * @JsonField(name="StockId", type="int")
     */
    public $stockId = null;

    /**
     * The stock code
     * @var string
     *
     * @JsonField(name="StockCode", type="string")
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