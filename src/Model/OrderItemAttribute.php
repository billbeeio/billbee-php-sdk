<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2020 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class OrderItemAttribute
{
    /**
     * @var int
     * @DataField(name="Id", type="string")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="Name", type="string")
     */
    public $name;

    /**
     * @var string
     * @DataField(name="Value", type="string")
     */
    public $value;

    /**
     * @var float
     * @DataField(name="Price", type="float")
     */
    public $price;
}
