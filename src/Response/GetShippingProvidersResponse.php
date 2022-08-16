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

use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use JMS\Serializer\Annotation as Serializer;

class GetShippingProvidersResponse extends BaseResponse
{
    /**
     * @var ShippingProvider[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\ShippingProvider>")
     * @Serializer\SerializedName("Data")
     */
    public $data = [];
}
