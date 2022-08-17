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

use BillbeeDe\BillbeeAPI\Type\EventType;
use JMS\Serializer\Annotation as Serializer;

class Event
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
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.v'>")
     * @Serializer\SerializedName("Created")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $created;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("TypeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *
     * @see EventType
     */
    public $typeId = EventType::ACCOUNT_CREATED;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TypeText")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $typeText = '';

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EmployeeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $employeeId = null;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EmployeeName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $employeeName = '';

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("OrderId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderId = null;

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

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): self
    {
        $this->typeId = $typeId;
        return $this;
    }

    public function getTypeText(): string
    {
        return $this->typeText;
    }

    public function setTypeText(string $typeText): self
    {
        $this->typeText = $typeText;
        return $this;
    }

    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    public function setEmployeeId(?string $employeeId): self
    {
        $this->employeeId = $employeeId;
        return $this;
    }

    public function getEmployeeName(): ?string
    {
        return $this->employeeName;
    }

    public function setEmployeeName(?string $employeeName): self
    {
        $this->employeeName = $employeeName;
        return $this;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }
}
