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

class ShippingProvider
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("id")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     */
    public $name = '';

    /**
     * @var string
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\ShippingProduct>")
     * @Serializer\SerializedName("products")
     */
    public $products = '';
}
