<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class CloudStorage
{
    /**
     * @var int
     * @DataField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="Name", type="string")
     */
    public $name;

    /**
     * @var string
     * @DataField(name="Type", type="string")
     */
    public $type;

    /**
     * @var bool
     * @DataField(name="UsedAsPrinter", type="bool")
     */
    public $usedAsPrinter;
}
