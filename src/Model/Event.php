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
use MintWare\DMM\DataField;

class Event
{
    /**
     * @var int
     * @DataField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="Created", type="datetime")
     */
    public $created = '';

    /**
     * @var int
     * @DataField(name="TypeId", type="int")
     *
     * @see EventType
     */
    public $typeId = EventType::ACCOUNT_CREATED;

    /**
     * @var string
     * @DataField(name="TypeText", type="string")
     */
    public $typeText = '';

    /**
     * @var int
     * @DataField(name="EmployeeId", type="int")
     */
    public $employeeId = null;

    /**
     * @var string
     * @DataField(name="EmployeeName", type="string")
     */
    public $employeeName = '';

    /**
     * @var int
     * @DataField(name="OrderId", type="int")
     */
    public $orderId = null;
}
