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

class Shipment
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingId")
     */
    public $shippingId = "";

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderId")
     */
    public $orderId = "";

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Comment")
     */
    public $comment = "";

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProviderId")
     */
    public $shippingProviderId = 0;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProviderProductId")
     */
    public $shippingProductId = 0;

    /**
     * Creates a shipment based on models
     *
     * @param ShippingProvider $provider The provider
     * @param ShippingProduct $product The product
     * @return Shipment The Shipment
     */
    public static function fromProviderAndProduct(ShippingProvider $provider, ShippingProduct $product)
    {
        $shipment = new Shipment();
        $shipment->shippingProviderId = $provider->id;
        $shipment->shippingProductId = $product->id;
        return $shipment;
    }
}
