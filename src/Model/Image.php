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

class Image
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Url")
     */
    public $url = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ThumbPathExt")
     */
    public $thumbPathExt = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ThumbUrl")
     */
    public $thumbUrl = '';

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Position")
     */
    public $position = 1;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsDefault")
     */
    public $isDefault = true;
}
