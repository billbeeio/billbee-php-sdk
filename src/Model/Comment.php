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

class Comment
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("Created")
     */
    public $created;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("FromCustomer")
     */
    public $fromCustomer;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Text")
     */
    public $text;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     */
    public $name;
}
