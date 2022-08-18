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

class Stock
{
    /**
     * @var ?string
     * The SKU of the Product
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Sku")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    protected $sku;

    /**
     * @var ?int
     * The id of the stock
     * @Serializer\Type("int")
     * @Serializer\SerializedName("StockId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    protected $stockId = null;

    /**
     * @var ?string
     * A note for the change
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Reason")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    protected $reason;

    /**
     * @var ?float
     * The old quantity
     * @Serializer\Type("float")
     * @Serializer\SerializedName("OldQuantity")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    protected $oldQuantity = 0;

    /**
     * @var ?float
     * The new quantity
     * @Serializer\Type("float")
     * @Serializer\SerializedName("NewQuantity")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    protected $newQuantity = 0;

    /**
     * @var float
     * The delta change
     * @Serializer\Type("float")
     * @Serializer\SerializedName("DeltaQuantity")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    protected $deltaQuantity = 0;

    /**
     * @var bool
     * If true, the reserved amount will be reduced on update
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("AutosubtractReservedAmount")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    protected $autosubtractReservedAmount = false;

    public static function fromProduct(Product $product): Stock
    {
        return new Stock($product->getSku(), $product->getStockCurrent());
    }

    public function __construct(?string $sku = null, ?float $oldQuantity = null, ?float $newQuantity = null)
    {
        $this
            ->setSku($sku)
            ->setOldQuantity($oldQuantity)
            ->setNewQuantity($newQuantity ?? $oldQuantity);
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

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->reason = $reason;
        return $this;
    }

    public function getOldQuantity(): ?float
    {
        return $this->oldQuantity;
    }

    public function setOldQuantity(?float $oldQuantity): Stock
    {
        $this->oldQuantity = $oldQuantity;
        $this->deltaQuantity = $this->getOldQuantity() - $this->getNewQuantity();
        return $this;
    }

    public function getNewQuantity(): ?float
    {
        return $this->newQuantity;
    }

    public function setNewQuantity(?float $newQuantity): Stock
    {
        $this->newQuantity = $newQuantity;
        $this->deltaQuantity = $this->getOldQuantity() - $this->getNewQuantity();
        return $this;
    }

    public function getDeltaQuantity(): ?float
    {
        return $this->deltaQuantity;
    }

    public function setDeltaQuantity(float $deltaQuantity): self
    {
        $this->deltaQuantity = $deltaQuantity;
        $this->newQuantity = $this->getOldQuantity() + $deltaQuantity;
        return $this;
    }

    public function getAutosubtractReservedAmount(): bool
    {
        return $this->autosubtractReservedAmount;
    }

    public function setAutosubtractReservedAmount(bool $autosubtractReservedAmount): self
    {
        $this->autosubtractReservedAmount = $autosubtractReservedAmount;
        return $this;
    }
}
