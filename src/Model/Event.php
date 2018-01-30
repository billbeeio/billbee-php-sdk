<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2018 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\EventType;
use MintWare\JOM\JsonField;

class Event
{
    /**
     * @var int
     * @JsonField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @JsonField(name="Created", type="datetime")
     */
    public $created = '';

    /**
     * @var int
     * @JsonField(name="TypeId", type="int")
     *
     * @see EventType
     */
    public $typeId = EventType::ACCOUNT_CREATED;

    /**
     * @var string
     * @JsonField(name="TypeText", type="string")
     */
    public $typeText = '';

    /**
     * @var int
     * @JsonField(name="EmployeeId", type="int")
     */
    public $employeeId = null;

    /**
     * @var string
     * @JsonField(name="EmployeeName", type="string")
     */
    public $employeeName = '';

    /**
     * @var int
     * @JsonField(name="OrderId", type="int")
     */
    public $orderId = null;
}
