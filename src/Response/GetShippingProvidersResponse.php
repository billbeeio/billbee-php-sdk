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

use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use JMS\Serializer\Annotation as Serializer;

/** @extends BaseResponse<ShippingProvider[]> */
class GetShippingProvidersResponse extends BaseResponse
{
    /**
     * @var ShippingProvider[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\ShippingProvider>")
     * @Serializer\SerializedName("Data")
     *
     * @deprecated Use getter/setter instead. Will be protected in the next major version.
     */
    public $data = [];
}
