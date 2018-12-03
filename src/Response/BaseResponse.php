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

namespace BillbeeDe\BillbeeAPI\Response;

use MintWare\DMM\DataField;

class BaseResponse
{
    /** @DataField(name="Paging", type="array") */
    public $paging = [];

    /** @DataField(name="ErrorMessage", type="string") */
    public $errorMessage = '';

    /** @DataField(name="ErrorCode", type="int") */
    public $errorCode = 0;

    /** @DataField(name="Data", type="array") */
    public $data = [];
}
