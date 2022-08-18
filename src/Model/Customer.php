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

class Customer
{
    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $name;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Email")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $email;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tel1")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $tel1;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tel2")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $tel2;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Number")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $number;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("PriceGroupId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $priceGroupId;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("LanguageId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $languageId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VatId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $vatId;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Type")
     */
    private $type = null;

    /**
     * @var CustomerMetaData|null
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")
     * @Serializer\SerializedName("DefaultMailAddress")
     */
    private $defaultMailAddress = null;

    /**
     * @var CustomerMetaData|null
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")
     * @Serializer\SerializedName("DefaultCommercialMailAddress")
     */
    private $defaultCommercialMailAddress = null;

    /**
     * @var CustomerMetaData|null
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")
     * @Serializer\SerializedName("DefaultStatusUpdatesMailAddress")
     */
    private $defaultStatusUpdatesMailAddress = null;

    /**
     * @var CustomerMetaData|null
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")
     * @Serializer\SerializedName("DefaultPhone1")
     */
    private $defaultPhone1 = null;

    /**
     * @var CustomerMetaData|null
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")
     * @Serializer\SerializedName("DefaultPhone2")
     */
    private $defaultPhone2 = null;

    /**
     * @var CustomerMetaData|null
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerMetaData")
     * @Serializer\SerializedName("DefaultFax")
     */
    private $defaultFax = null;

    /**
     * @var CustomerMetaData[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\CustomerMetaData>")
     * @Serializer\SerializedName("MetaData")
     */
    private $metaData = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getTel1(): ?string
    {
        return $this->tel1;
    }

    public function setTel1(?string $tel1): self
    {
        $this->tel1 = $tel1;
        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(?string $tel2): self
    {
        $this->tel2 = $tel2;
        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): self
    {
        $this->number = $number;
        return $this;
    }

    public function getPriceGroupId(): ?int
    {
        return $this->priceGroupId;
    }

    public function setPriceGroupId(?int $priceGroupId): self
    {
        $this->priceGroupId = $priceGroupId;
        return $this;
    }

    public function getLanguageId(): ?int
    {
        return $this->languageId;
    }

    public function setLanguageId(?int $languageId): self
    {
        $this->languageId = $languageId;
        return $this;
    }

    public function getVatId(): ?string
    {
        return $this->vatId;
    }

    public function setVatId(?string $vatId): self
    {
        $this->vatId = $vatId;
        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getDefaultMailAddress(): ?CustomerMetaData
    {
        return $this->defaultMailAddress;
    }

    public function setDefaultMailAddress(?CustomerMetaData $defaultMailAddress): self
    {
        $this->defaultMailAddress = $defaultMailAddress;
        return $this;
    }

    public function getDefaultCommercialMailAddress(): ?CustomerMetaData
    {
        return $this->defaultCommercialMailAddress;
    }

    public function setDefaultCommercialMailAddress(?CustomerMetaData $defaultCommercialMailAddress): self
    {
        $this->defaultCommercialMailAddress = $defaultCommercialMailAddress;
        return $this;
    }

    public function getDefaultStatusUpdatesMailAddress(): ?CustomerMetaData
    {
        return $this->defaultStatusUpdatesMailAddress;
    }

    public function setDefaultStatusUpdatesMailAddress(?CustomerMetaData $defaultStatusUpdatesMailAddress): self
    {
        $this->defaultStatusUpdatesMailAddress = $defaultStatusUpdatesMailAddress;
        return $this;
    }

    public function getDefaultPhone1(): ?CustomerMetaData
    {
        return $this->defaultPhone1;
    }

    public function setDefaultPhone1(?CustomerMetaData $defaultPhone1): self
    {
        $this->defaultPhone1 = $defaultPhone1;
        return $this;
    }

    public function getDefaultPhone2(): ?CustomerMetaData
    {
        return $this->defaultPhone2;
    }

    public function setDefaultPhone2(?CustomerMetaData $defaultPhone2): self
    {
        $this->defaultPhone2 = $defaultPhone2;
        return $this;
    }

    public function getDefaultFax(): ?CustomerMetaData
    {
        return $this->defaultFax;
    }

    public function setDefaultFax(?CustomerMetaData $defaultFax): self
    {
        $this->defaultFax = $defaultFax;
        return $this;
    }

    /** @return CustomerMetaData[] */
    public function getMetaData(): array
    {
        return $this->metaData;
    }

    /** @param CustomerMetaData[] $metaData */
    public function setMetaData(array $metaData): self
    {
        $this->metaData = $metaData;
        return $this;
    }
}
