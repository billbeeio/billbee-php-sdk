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

namespace BillbeeDe\BillbeeAPI\Model\Search;

use JMS\Serializer\Annotation as Serializer;

class CustomerResult
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id = 0;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $name = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Addresses")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $addresses = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Number")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $number = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CustomerResult
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): CustomerResult
    {
        $this->name = $name;
        return $this;
    }

    public function getAddresses(): string
    {
        return $this->addresses;
    }

    public function setAddresses(string $addresses): CustomerResult
    {
        $this->addresses = $addresses;
        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): CustomerResult
    {
        $this->number = $number;
        return $this;
    }
}
