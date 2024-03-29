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

use BillbeeDe\BillbeeAPI\Model\Event;
use JMS\Serializer\Annotation as Serializer;

/** @extends BaseResponse<Event[]> */
class GetEventsResponse extends BaseResponse
{
    /**
     * @var Event[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Event>")
     * @Serializer\SerializedName("Data")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $data = [];
}
