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

use MintWare\DMM\DataField;

class BillOfMaterialProduct
{
    /**
     * @var int
     * @DataField(name="ArticleId", type="int")
     */
    public $articleId;

    /**
     * @var float
     * @DataField(name="Amount", type="float")
     */
    public $amount;

    /**
     * @var string
     * @DataField(name="SKU", type="string")
     */
    public $sku;
}
