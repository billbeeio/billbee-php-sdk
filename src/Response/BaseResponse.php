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

use JMS\Serializer\Annotation as Serializer;

class BaseResponse
{
    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Paging")
     */
    public $paging = [];

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ErrorMessage")
     */
    public $errorMessage = '';

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ErrorCode")
     */
    public $errorCode = 0;

    /**
     * @var mixed
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Data")
     */
    public $data = null;
}
