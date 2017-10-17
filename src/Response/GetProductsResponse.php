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

namespace BillbeeDe\BillbeeAPI\Response;

use MintWare\JOM\JsonField;

class GetProductsResponse extends BaseResponse
{
    /**
     * @var \BillbeeDe\BillbeeAPI\Model\Product[]
     * @JsonField(name="Data", type="\BillbeeDe\BillbeeAPI\Model\Product[]")
     */
    public $data = [];
}
