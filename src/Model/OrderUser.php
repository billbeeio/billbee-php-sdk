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

class OrderUser
{
    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Platform")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $platform;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("BillbeeShopName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shopName;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeShopId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shopId;

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
     * @Serializer\SerializedName("Nick")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $nick;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FirstName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $firstName;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LastName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $lastName;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FullName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $fullName;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Email")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $email;

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(?string $platform): self
    {
        $this->platform = $platform;
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

    public function getShopId(): ?int
    {
        return $this->shopId;
    }

    public function setShopId(?int $shopId): self
    {
        $this->shopId = $shopId;
        return $this;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function setNick(?string $nick): self
    {
        $this->nick = $nick;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;
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
}
