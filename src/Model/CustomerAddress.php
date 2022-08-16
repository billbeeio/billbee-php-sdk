<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class CustomerAddress
{
    const TYPE_INVOICE = 1;
    const TYPE_DELIVERY = 2;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var integer
     * @Serializer\Type("integer|string")
     * @Serializer\SerializedName("AddressType")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $addressType = self::TYPE_INVOICE;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("CustomerId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $customerId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Company")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $company;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FirstName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LastName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $lastName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name2")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $name2;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Street")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $street;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Housenumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $houseNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Zip")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $zip;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("City")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $city;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("State")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $state;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryCode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $countryCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Email")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tel1")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $phone1;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tel2")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $phone2;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Fax")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $fax;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FullAddr")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $fullAddress;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AddressAddition")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $addressAddition;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getAddressType(): int
    {
        return $this->addressType;
    }

    public function setAddressType(int $addressType): self
    {
        $this->addressType = $addressType;
        return $this;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): self
    {
        $this->customerId = $customerId;
        return $this;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getName2(): string
    {
        return $this->name2;
    }

    public function setName2(string $name2): self
    {
        $this->name2 = $name2;
        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): self
    {
        $this->houseNumber = $houseNumber;
        return $this;
    }

    public function getZip(): string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;
        return $this;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPhone1(): string
    {
        return $this->phone1;
    }

    public function setPhone1(string $phone1): self
    {
        $this->phone1 = $phone1;
        return $this;
    }

    public function getPhone2(): string
    {
        return $this->phone2;
    }

    public function setPhone2(string $phone2): self
    {
        $this->phone2 = $phone2;
        return $this;
    }

    public function getFax(): string
    {
        return $this->fax;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;
        return $this;
    }

    public function getFullAddress(): string
    {
        return $this->fullAddress;
    }

    public function setFullAddress(string $fullAddress): self
    {
        $this->fullAddress = $fullAddress;
        return $this;
    }

    public function getAddressAddition(): string
    {
        return $this->addressAddition;
    }

    public function setAddressAddition(string $addressAddition): self
    {
        $this->addressAddition = $addressAddition;
        return $this;
    }

}
