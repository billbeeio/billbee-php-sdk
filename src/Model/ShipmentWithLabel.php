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

class ShipmentWithLabel
{
    /**
     * The Billbee internal id of the order to ship
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("OrderId")
     */
    public $orderId;

    /**
     * The id of the provider. You can query all providers with the shippingproviders endpoint
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ProviderId")
     */
    public $providerId;

    /**
     * The id of the shipping provider product to be used
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ProductId")
     */
    public $productId;

    /**
     * Optional parameter to automatically change the orderstate to sent after creating the shipment
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("ChangeStateToSend")
     */
    public $changeStateToSend;

    /**
     * Optional the name of a connected cloudprinter to send the label to
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PrinterName")
     */
    public $printerName;

    /**
     * Optional the shipments weight in gram to override the calculated weight
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("WeightInGram")
     */
    public $weightInGram;

    /**
     * Optional specify the shipdate to be transmitted to the carrier
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("ShipDate")
     */
    public $shipDate;

    /**
     * Optional specify a reference text to be included on the label. Not all carriers support this option.
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ClientReference")
     */
    public $clientReference;

    /**
     * Option specify the dimensions of the package in cm
     * @var Dimensions
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Dimensions")
     * @Serializer\SerializedName("Dimension")
     */
    public $dimension;
}
