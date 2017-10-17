<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\JOM\JsonField;

class Shipment
{
    /**
     * @var string
     * @JsonField(name="ShippingId", type="string")
     */
    public $shippingId = "";

    /**
     * @var string
     * @JsonField(name="OrderId", type="string")
     */
    public $orderId = "";

    /**
     * @var string
     * @JsonField(name="Comment", type="string")
     */
    public $comment = "";

    /**
     * @var int
     * @JsonField(name="ShippingProviderId", type="int")
     */
    public $shippingProviderId = 0;

    /**
     * @var int
     * @JsonField(name="ShippingProviderProductId", type="int")
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