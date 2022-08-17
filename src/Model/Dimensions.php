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

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class Dimensions
{
    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("width")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $width;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("height")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $height;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("length")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $length;

    /**
     * @param float $width The width
     * @param float $height The height
     * @param float $length The length
     */
    public function __construct(float $width = 0.0, float $height = 0.0, float $length = 0.0)
    {
        $this->width = (float)$width;
        $this->height = (float)$height;
        $this->length = (float)$length;
    }

    public function getWidth(): float
    {
        return $this->width;
    }

    public function setWidth(float $width): self
    {
        $this->width = $width;
        return $this;
    }

    public function getHeight(): float
    {
        return $this->height;
    }

    public function setHeight(float $height): self
    {
        $this->height = $height;
        return $this;
    }

    public function getLength(): float
    {
        return $this->length;
    }

    public function setLength(float $length): self
    {
        $this->length = $length;
        return $this;
    }


}
