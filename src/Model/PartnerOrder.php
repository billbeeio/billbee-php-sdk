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

use BillbeeDe\BillbeeAPI\Type\OrderState;
use JMS\Serializer\Annotation as Serializer;

class PartnerOrder
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ExternalId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $externalId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceNumber;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("InvoiceCreatedAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceCreatedAt;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("InvoiceDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceDate;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("CreatedAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $createdAt;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("PaidAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $paidAt;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("ShippedAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippedAt;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("HasInvoice")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $hasInvoice = false;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("OrderStateId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     * @see OrderState
     */
    public $orderStateId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderStateText")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderStateText;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalGross")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $totalGross;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShopName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shopName;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("CanCreateAutoInvoice")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $canCreateAutoInvoice = false;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;
        return $this;
    }

    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(?string $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function getInvoiceCreatedAt(): ?\DateTime
    {
        return $this->invoiceCreatedAt;
    }

    public function setInvoiceCreatedAt(?\DateTime $invoiceCreatedAt): self
    {
        $this->invoiceCreatedAt = $invoiceCreatedAt;
        return $this;
    }

    public function getInvoiceDate(): ?\DateTime
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(?\DateTime $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getPaidAt(): ?\DateTime
    {
        return $this->paidAt;
    }

    public function setPaidAt(?\DateTime $paidAt): self
    {
        $this->paidAt = $paidAt;
        return $this;
    }

    public function getShippedAt(): ?\DateTime
    {
        return $this->shippedAt;
    }

    public function setShippedAt(?\DateTime $shippedAt): self
    {
        $this->shippedAt = $shippedAt;
        return $this;
    }

    public function hasInvoice(): bool
    {
        return $this->hasInvoice;
    }

    public function setHasInvoice(bool $hasInvoice): self
    {
        $this->hasInvoice = $hasInvoice;
        return $this;
    }

    public function getOrderStateId(): int
    {
        return $this->orderStateId;
    }

    public function setOrderStateId(int $orderStateId): self
    {
        $this->orderStateId = $orderStateId;
        return $this;
    }

    public function getOrderStateText(): ?string
    {
        return $this->orderStateText;
    }

    public function setOrderStateText(?string $orderStateText): self
    {
        $this->orderStateText = $orderStateText;
        return $this;
    }

    public function getTotalGross(): float
    {
        return $this->totalGross;
    }

    public function setTotalGross(float $totalGross): self
    {
        $this->totalGross = $totalGross;
        return $this;
    }

    public function getShopName(): ?string
    {
        return $this->shopName;
    }

    public function setShopName(?string $shopName): self
    {
        $this->shopName = $shopName;
        return $this;
    }

    public function canCreateAutoInvoice(): bool
    {
        return $this->canCreateAutoInvoice;
    }

    public function setCanCreateAutoInvoice(bool $canCreateAutoInvoice): self
    {
        $this->canCreateAutoInvoice = $canCreateAutoInvoice;
        return $this;
    }
}
