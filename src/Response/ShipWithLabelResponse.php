<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\Model\ShipmentWithLabelResult;
use JMS\Serializer\Annotation as Serializer;

/** @extends BaseResponse<?ShipmentWithLabelResult> */
class ShipWithLabelResponse extends BaseResponse
{
    /**
     * @var ?ShipmentWithLabelResult
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Response\Model\ShipmentWithLabelResult")
     * @Serializer\SerializedName("Data")
     *
     * @deprecated Use getter/setter instead. Will be protected in the next major version.
     */
    public $data = null;
}
