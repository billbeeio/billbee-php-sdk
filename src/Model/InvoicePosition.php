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

class InvoicePosition
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Position")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $position;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Amount")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $amount = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("NetValue")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $netValue = 0.0000000;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalNetValue")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $totalNetValue = 0.0000000;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("GrossValue")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $grossValue = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalGrossValue")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $totalGrossValue = 0.00;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("VatRate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $vatRate = 0.00;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ArticleBillbeeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $articleId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Sku")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sku = '';

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Title")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $title = '';

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalVatAmount")
     */
    private $totalVatAmount = 0;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("RebatePercent")
     */
    private $rebatePercent = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
        return $this;
    }

    public function getNetValue(): float
    {
        return $this->netValue;
    }

    public function setNetValue(float $netValue): self
    {
        $this->netValue = $netValue;
        return $this;
    }

    public function getTotalNetValue(): float
    {
        return $this->totalNetValue;
    }

    public function setTotalNetValue(float $totalNetValue): self
    {
        $this->totalNetValue = $totalNetValue;
        return $this;
    }

    public function getGrossValue(): float
    {
        return $this->grossValue;
    }

    public function setGrossValue(float $grossValue): self
    {
        $this->grossValue = $grossValue;
        return $this;
    }

    public function getTotalGrossValue(): float
    {
        return $this->totalGrossValue;
    }

    public function setTotalGrossValue(float $totalGrossValue): self
    {
        $this->totalGrossValue = $totalGrossValue;
        return $this;
    }

    public function getVatRate(): ?float
    {
        return $this->vatRate;
    }

    public function setVatRate(?float $vatRate): self
    {
        $this->vatRate = $vatRate;
        return $this;
    }

    public function getArticleId(): ?int
    {
        return $this->articleId;
    }

    public function setArticleId(?int $articleId): self
    {
        $this->articleId = $articleId;
        return $this;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTotalVatAmount(): float
    {
        return $this->totalVatAmount;
    }

    public function setTotalVatAmount(float $totalVatAmount): self
    {
        $this->totalVatAmount = $totalVatAmount;
        return $this;
    }

    public function getRebatePercent(): ?float
    {
        return $this->rebatePercent;
    }

    public function setRebatePercent(?float $rebatePercent): self
    {
        $this->rebatePercent = $rebatePercent;
        return $this;
    }
}
