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

namespace BillbeeDe\BillbeeAPI\Model\Search;

use MintWare\DMM\DataField;

class ProductResult
{
    /**
     * @var int
     * @DataField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="ShortText", type="string")
     */
    public $shortText = '';

    /**
     * @var string
     * @DataField(name="SKU", type="string")
     */
    public $sku = '';

    /**
     * @var string
     * @DataField(name="Tags", type="string")
     */
    public $tags = '';
}
