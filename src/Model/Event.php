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

use BillbeeDe\BillbeeAPI\Type\EventType;
use JMS\Serializer\Annotation as Serializer;

class Event
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("Created")
     */
    public $created = '';

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("TypeId")
     *
     * @see EventType
     */
    public $typeId = EventType::ACCOUNT_CREATED;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TypeText")
     */
    public $typeText = '';

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("EmployeeId")
     */
    public $employeeId = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EmployeeName")
     */
    public $employeeName = '';

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("OrderId")
     */
    public $orderId = null;
}
