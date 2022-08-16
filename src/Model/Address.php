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

class Address
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
     * @Serializer\SerializedName("Street")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $street;

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
     * @Serializer\SerializedName("Line2")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $line2;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Line3")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $line3;

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
     * @Serializer\SerializedName("State")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $state;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Country")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $country;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryISO2")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $countryISO2;

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
     * @Serializer\SerializedName("Phone")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $phone;

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
     * @Serializer\SerializedName("HouseNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $houseNumber;

    /** Not Mapped */
    public $comment;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("NameAddition")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $nameAddition;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
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

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;
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

    public function getLine2(): string
    {
        return $this->line2;
    }

    public function setLine2(string $line2): self
    {
        $this->line2 = $line2;
        return $this;
    }

    public function getLine3(): string
    {
        return $this->line3;
    }

    public function setLine3(string $line3): self
    {
        $this->line3 = $line3;
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

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;
        return $this;
    }

    public function getCountryISO2(): string
    {
        return $this->countryISO2;
    }

    public function setCountryISO2(string $countryISO2): self
    {
        $this->countryISO2 = $countryISO2;
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

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
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

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): self
    {
        $this->houseNumber = $houseNumber;
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    public function getNameAddition(): string
    {
        return $this->nameAddition;
    }

    public function setNameAddition(string $nameAddition): self
    {
        $this->nameAddition = $nameAddition;
        return $this;
    }
}
