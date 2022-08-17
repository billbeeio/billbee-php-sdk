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

use JsonSerializable;

class Stock implements JsonSerializable
{
    /**
     * The SKU of the Product
     * @var string
     */
    protected $sku;

    /**
     * The Id of the stock
     * @var int|null
     */
    protected $stockId = null;

    /**
     * A note for the change
     * @var string
     */
    protected $reason;

    /**
     * The old quantity
     * @var float
     */
    protected $oldQuantity = 0;

    /**
     * The new quantity
     * @var float
     */
    protected $newQuantity = 0;

    /**
     * The delta change
     * @var float
     */
    protected $deltaQuantity = 0;

    /**
     * If true, the reserved amount will be reduced on update
     * @var bool
     */
    protected $autosubtractReservedAmount = false;

    public static function fromProduct(Product $product)
    {
        return new Stock($product->sku, $product->stockCurrent);
    }

    public function __construct($sku, $oldQuantity, $newQuantity = null)
    {
        $this->sku = $sku;
        $this->oldQuantity = $oldQuantity;
        if ($newQuantity === null) {
            $newQuantity = $oldQuantity;
        }
        $this->setNewQuantity($newQuantity);
    }

    /**
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     * @return Stock
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return int
     */
    public function getStockId()
    {
        return $this->stockId;
    }

    /**
     * @param int $stockId
     * @return Stock
     */
    public function setStockId($stockId)
    {
        $this->stockId = $stockId;
        return $this;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     * @return Stock
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return float
     */
    public function getOldQuantity()
    {
        return $this->oldQuantity;
    }

    /**
     * @param float $oldQuantity
     * @return Stock
     */
    public function setOldQuantity($oldQuantity)
    {
        $this->oldQuantity = $oldQuantity;
        $this->deltaQuantity = $this->oldQuantity - $this->newQuantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getNewQuantity()
    {
        return $this->newQuantity;
    }

    /**
     * @param float $newQuantity
     * @return Stock
     */
    public function setNewQuantity($newQuantity)
    {
        $this->newQuantity = $newQuantity;
        $this->deltaQuantity = $this->oldQuantity - $this->newQuantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getDeltaQuantity()
    {
        return $this->deltaQuantity;
    }

    /**
     * @param float $deltaQuantity
     * @return Stock
     */
    public function setDeltaQuantity($deltaQuantity)
    {
        $this->deltaQuantity = $deltaQuantity;
        $this->newQuantity = $this->oldQuantity + $deltaQuantity;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAutosubtractReservedAmount()
    {
        return $this->autosubtractReservedAmount;
    }

    /**
     * @param bool $autosubtractReservedAmount
     * @return Stock
     */
    public function setAutosubtractReservedAmount($autosubtractReservedAmount)
    {
        $this->autosubtractReservedAmount = $autosubtractReservedAmount;
        return $this;
    }

    public function jsonSerialize()
    {
        $data = [
            'Sku' => $this->sku,
            'Reason' => $this->reason,
            'OldQuantity' => $this->oldQuantity,
            'NewQuantity' => $this->newQuantity,
            'DeltaQuantity' => $this->deltaQuantity,
            'AutosubtractReservedAmount' => $this->autosubtractReservedAmount,
        ];

        if (!is_null($this->stockId)) {
            $data['StockId'] = $this->stockId;
        }

        return $data;
    }
}
