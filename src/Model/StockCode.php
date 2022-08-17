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

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class StockCode
{
    /**
     * The SKU of the Product
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Sku")
     */
    public $sku;

    /**
     * The Id of the stock
     * @var int
     *
     * @Serializer\Type("int")
     * @Serializer\SerializedName("StockId")
     */
    public $stockId = null;

    /**
     * The stock code
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("StockCode")
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
