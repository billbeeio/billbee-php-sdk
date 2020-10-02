<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2020 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Response;

use MintWare\DMM\DataField;

class GetCustomFieldDefinitionResponse extends BaseResponse
{
    /**
     * @var \BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition
     * @DataField(name="Data", type="\BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition")
     */
    public $data = null;
}
