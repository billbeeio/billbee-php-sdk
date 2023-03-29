<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class SoldProduct
{
    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OldId")
     */
    private $oldId;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $billbeeId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Title")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $title;

    /**
     * Weight of one item in gram
     *
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Weight")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $weight;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SKU")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sku;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SkuOrId")
     */
    private $skuOrId;

    /**
     * @var ?bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsDigital")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $isDigital;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EAN")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $ean;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TARICCode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $taric;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryOfOrigin")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $countryOfOrigin;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getOldId(): ?string
    {
        return $this->oldId;
    }

    public function setOldId(?string $oldId): self
    {
        $this->oldId = $oldId;
        return $this;
    }

    public function getBillbeeId(): ?int
    {
        return $this->billbeeId;
    }

    public function setBillbeeId(?int $billbeeId): self
    {
        $this->billbeeId = $billbeeId;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;
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

    public function getSkuOrId(): ?string
    {
        return $this->skuOrId;
    }

    public function setSkuOrId(string $skuOrId): self
    {
        $this->skuOrId = $skuOrId;
        return $this;
    }

    public function getIsDigital(): ?bool
    {
        return $this->isDigital;
    }

    public function setIsDigital(?bool $isDigital): self
    {
        $this->isDigital = $isDigital;
        return $this;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(string $ean): self
    {
        $this->ean = $ean;
        return $this;
    }

    public function getTaric(): ?string
    {
        return $this->taric;
    }

    public function setTaric(?string $taric): self
    {
        $this->taric = $taric;
        return $this;
    }

    public function getCountryOfOrigin(): ?string
    {
        return $this->countryOfOrigin;
    }

    public function setCountryOfOrigin(?string $countryOfOrigin): self
    {
        $this->countryOfOrigin = $countryOfOrigin;
        return $this;
    }
}
