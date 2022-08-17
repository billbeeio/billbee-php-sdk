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

class Comment
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
     * @var ?\DateTime
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.v\Z', 'UTC'>")
     * @Serializer\SerializedName("Created")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $created = null;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("FromCustomer")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $fromCustomer;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Text")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $text;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $name;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    public function setCreated(\DateTime $created): self
    {
        $this->created = $created;
        return $this;
    }

    public function isFromCustomer(): bool
    {
        return $this->fromCustomer;
    }

    public function setFromCustomer(bool $fromCustomer): self
    {
        $this->fromCustomer = $fromCustomer;
        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
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
}
