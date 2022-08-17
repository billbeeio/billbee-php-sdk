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

use BillbeeDe\BillbeeAPI\Model\PartnerOrder;
use JMS\Serializer\Annotation as Serializer;

class GetOrderByPartnerResponse extends BaseResponse
{
    /**
     * @var PartnerOrder
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\PartnerOrder")
     * @Serializer\SerializedName("Data")
     */
    public $data = null;
}
