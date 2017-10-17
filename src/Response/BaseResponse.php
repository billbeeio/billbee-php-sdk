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

class BaseResponse
{
    /** @JsonField(name="Paging", type="array") */
    public $paging = [];

    /** @JsonField(name="ErrorMessage", type="string") */
    public $errorMessage = '';

    /** @JsonField(name="ErrorCode", type="int") */
    public $errorCode = 0;

    /** @JsonField(name="Data", type="array") */
    public $data = [];
}
