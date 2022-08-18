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
     * @var ?string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Sku")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sku;

    /**
     * The id of the stock
     * @var int
     *
     * @Serializer\Type("int")
     * @Serializer\SerializedName("StockId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $stockId = null;

    /**
     * The stock code
     * @var ?string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("StockCode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $stockCode;

    public static function fromProduct(Product $product): StockCode
    {
        $stockCode = new StockCode();
        $stockCode->setSku($product->getSku());
        $stockCode->setStockCode($product->getStockCode());
        return $stockCode;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(?string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    public function getStockId(): ?int
    {
        return $this->stockId;
    }

    public function setStockId(?int $stockId): self
    {
        $this->stockId = $stockId;
        return $this;
    }

    public function getStockCode(): ?string
    {
        return $this->stockCode;
    }

    public function setStockCode(?string $stockCode): self
    {
        $this->stockCode = $stockCode;
        return $this;
    }
}
