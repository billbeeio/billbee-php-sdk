<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class Dimensions
{
    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("width")
     */
    public $width;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("height")
     */
    public $height;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("length")
     */
    public $length;

    /**
     * @param float $width The width
     * @param float $height The height
     * @param float $length The length
     */
    public function __construct($width = 0.0, $height = 0.0, $length = 0.0)
    {
        $this->width = (float)$width;
        $this->height = (float)$height;
        $this->length = (float)$length;
    }
}
