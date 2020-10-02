<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2020 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\LayoutType;
use MintWare\DMM\DataField;

class Layout
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
    public $name = '';

    /**
     * @var int
     * @DataField(name="Type", type="int")
     *
     * @see LayoutType
     */
    public $type = LayoutType::INVOICE;
}
