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

use BillbeeDe\BillbeeAPI\Type\LayoutType;
use JMS\Serializer\Annotation as Serializer;

class Layout
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
     * @Serializer\SerializedName("Name")
     */
    public $name = '';

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Type")
     *
     * @see LayoutType
     */
    public $type = LayoutType::INVOICE;
}
