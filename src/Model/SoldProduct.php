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

class SoldProduct
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     */
    public $billbeeId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Title")
     */
    public $title;

    /**
     * Weight of one item in gram
     *
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Weight")
     */
    public $weight;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SKU")
     */
    public $sku;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsDigital")
     */
    public $isDigital;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EAN")
     */
    public $ean;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TARICCode")
     */
    public $taric;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryOfOrigin")
     */
    public $countryOfOrigin;
}
