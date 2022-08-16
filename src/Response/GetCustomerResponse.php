<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Customer;
use JMS\Serializer\Annotation as Serializer;

class GetCustomerResponse extends BaseResponse
{
    /**
     * @var Customer
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Customer")
     * @Serializer\SerializedName("Data")
     */
    public $data = null;
}
