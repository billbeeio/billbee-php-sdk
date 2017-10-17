<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\JOM\JsonField;

class ShippingProvider
{
    /**
     * @var int
     * @JsonField(name="id", type="int")
     */
    public $id;

    /**
     * @var string
     * @JsonField(name="name", type="string")
     */
    public $name = '';

    /**
     * @var string
     * @JsonField(name="products", type="BillbeeDe\BillbeeAPI\Model\ShippingProduct[]")
     */
    public $products = '';
}
