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

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class Seller
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Platform")
     */
    public $platform;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("BillbeeShopName")
     */
    public $shopName;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeShopId")
     */
    public $shopId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Nick")
     */
    public $nick;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FirstName")
     */
    public $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LastName")
     */
    public $lastName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FullName")
     */
    public $fullName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Email")
     */
    public $email;
}
