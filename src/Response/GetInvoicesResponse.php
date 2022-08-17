<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Invoice;
use JMS\Serializer\Annotation as Serializer;

class GetInvoicesResponse extends BaseResponse
{
    /**
     * @var Invoice[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Invoice>")
     * @Serializer\SerializedName("Data")
     */
    public $data = [];
}
