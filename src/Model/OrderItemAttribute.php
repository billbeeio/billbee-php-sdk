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

class OrderItemAttribute
{
    /**
     * @var int
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     */
    public $name;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Value")
     */
    public $value;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Price")
     */
    public $price;
}
