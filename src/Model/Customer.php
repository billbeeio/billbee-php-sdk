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

class Customer
{
    /**
     * @var integer
     * @Serializer\Type("integer")
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
     * @Serializer\SerializedName("Email")
     */
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tel1")
     */
    public $tel1;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tel2")
     */
    public $tel2;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Number")
     */
    public $number;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("PriceGroupId")
     */
    public $priceGroupId;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("LanguageId")
     */
    public $languageId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VatId")
     */
    public $vatId;
}
