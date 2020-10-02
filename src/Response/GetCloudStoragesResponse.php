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

namespace BillbeeDe\BillbeeAPI\Response;

use MintWare\DMM\DataField;

class GetCloudStoragesResponse extends BaseResponse
{
    /**
     * @var \BillbeeDe\BillbeeAPI\Model\CloudStorage[]
     * @DataField(name="Data", type="\BillbeeDe\BillbeeAPI\Model\CloudStorage[]")
     */
    public $data = null;
}
