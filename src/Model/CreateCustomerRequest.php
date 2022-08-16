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

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class CreateCustomerRequest extends Customer
{
    /**
     * @var CustomerAddress
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomerAddress")
     * @Serializer\SerializedName("Address")
     */
    public $address;
}
