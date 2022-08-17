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

class CustomFieldDefinition
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $name;

    /**
     * @var array
     * @Serializer\Type("CustomField")
     * @Serializer\SerializedName("Configuration")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $configuration;

    /**
     * @var integer
     * @see \BillbeeDe\BillbeeAPI\Type\CustomFieldDefinitionType
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Type")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $type;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsNullable")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $isNullable;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getConfiguration(): array
    {
        return $this->configuration;
    }

    public function setConfiguration(array $configuration): self
    {
        $this->configuration = $configuration;
        return $this;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function isNullable(): bool
    {
        return $this->isNullable;
    }

    public function setIsNullable(bool $isNullable): self
    {
        $this->isNullable = $isNullable;
        return $this;
    }


}
