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

class OrderItem
{
    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $billbeeId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TransactionId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $transactionId;

    /**
     * @var ?SoldProduct
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\SoldProduct")
     * @Serializer\SerializedName("Product")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $product;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Quantity")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $quantity;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalPrice")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $totalPrice;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("UnrebatedTotalPrice")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $unrebatedTotalPrice;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TaxAmount")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $taxAmount;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("TaxIndex")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $taxIndex;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Discount")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $discount;

    /**
     * @var ?OrderItemAttribute[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\OrderItemAttribute>")
     * @Serializer\SerializedName("Attributes")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $attributes;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("GetPriceFromArticleIfAny")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $getPriceFromArticleIfAny = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsCoupon")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $isCoupon = false;

    /**
     * @var mixed
     * @deprecated Removed in the next major version.
     */
    public $shippingProfileId;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("DontAdjustStock")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $dontAdjustStock;

    /**
     * Contains the used serial number
     *
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SerialNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $serialNumber;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceSKU")
     */
    private $invoiceSku;

    public function getBillbeeId(): ?int
    {
        return $this->billbeeId;
    }

    public function setBillbeeId(?int $billbeeId): self
    {
        $this->billbeeId = $billbeeId;
        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function getProduct(): ?SoldProduct
    {
        return $this->product;
    }

    public function setProduct(?SoldProduct $product): self
    {
        $this->product = $product;
        return $this;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): self
    {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    public function getUnrebatedTotalPrice(): float
    {
        return $this->unrebatedTotalPrice;
    }

    public function setUnrebatedTotalPrice(float $unrebatedTotalPrice): self
    {
        $this->unrebatedTotalPrice = $unrebatedTotalPrice;
        return $this;
    }

    public function getTaxAmount(): float
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(float $taxAmount): self
    {
        $this->taxAmount = $taxAmount;
        return $this;
    }

    public function getTaxIndex(): ?int
    {
        return $this->taxIndex;
    }

    public function setTaxIndex(?int $taxIndex): self
    {
        $this->taxIndex = $taxIndex;
        return $this;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;
        return $this;
    }

    /** @return ?OrderItemAttribute[] */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /** @param ?OrderItemAttribute[] $attributes */
    public function setAttributes(?array $attributes): self
    {
        $this->attributes = $attributes;
        return $this;
    }

    public function shouldGetPriceFromArticleIfAny(): bool
    {
        return $this->getPriceFromArticleIfAny;
    }

    public function setGetPriceFromArticleIfAny(bool $getPriceFromArticleIfAny): self
    {
        $this->getPriceFromArticleIfAny = $getPriceFromArticleIfAny;
        return $this;
    }

    public function isCoupon(): bool
    {
        return $this->isCoupon;
    }

    public function setIsCoupon(bool $isCoupon): self
    {
        $this->isCoupon = $isCoupon;
        return $this;
    }

    public function shouldAdjustStock(): bool
    {
        return !$this->dontAdjustStock;
    }

    public function setAdjustStock(bool $adjustStock): self
    {
        $this->dontAdjustStock = !$adjustStock;
        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    public function setSerialNumber(?string $serialNumber): self
    {
        $this->serialNumber = $serialNumber;
        return $this;
    }

    public function getInvoiceSku(): ?string
    {
        return $this->invoiceSku;
    }

    public function setInvoiceSku(?string $invoiceSku): self
    {
        $this->invoiceSku = $invoiceSku;
        return $this;
    }
}
