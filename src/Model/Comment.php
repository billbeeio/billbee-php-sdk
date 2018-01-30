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

use MintWare\JOM\JsonField;

class Comment
{
    /**
     * @var int
     * @JsonField(name="Id", type="int")
     */
    public $id;

    /**
     * @var \DateTime
     * @JsonField(name="Created", type="datetime")
     */
    public $created;

    /**
     * @var bool
     * @JsonField(name="FromCustomer", type="bool")
     */
    public $fromCustomer;

    /**
     * @var string
     * @JsonField(name="Text", type="string")
     */
    public $text;

    /**
     * @var string
     * @JsonField(name="Name", type="string")
     */
    public $name;
}
