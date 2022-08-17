<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2022 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class CustomerMetaData
{
    public const TYPE_MAIL = 1;
    public const TYPE_PHONE = 2;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     */
    private $id = 0;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("TypeId")
     */
    private $typeId = 0;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TypeName")
     */
    private $typeName = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SubType")
     */
    private $subType = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Value")
     */
    private $value = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;
        return $this;
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }

    public function setTypeName(string $typeName): self
    {
        $this->typeName = $typeName;
        return $this;
    }

    public function getSubType(): string
    {
        return $this->subType;
    }

    public function setSubType(string $subType): self
    {
        $this->subType = $subType;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }
}
