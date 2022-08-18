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

class CloudStorage
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
     * @Serializer\SerializedName("Name")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $name;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Type")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $type;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("UsedAsPrinter")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $usedAsPrinter;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function isUsedAsPrinter(): bool
    {
        return $this->usedAsPrinter;
    }

    public function setUsedAsPrinter(bool $usedAsPrinter): self
    {
        $this->usedAsPrinter = $usedAsPrinter;
        return $this;
    }
}
