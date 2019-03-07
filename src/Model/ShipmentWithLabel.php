<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class ShipmentWithLabel
{
    /**
     * The Billbee internal id of the order to ship
     * @var int
     * @DataField(name="OrderId", type="int")
     */
    public $orderId;

    /**
     * The id of the provider. You can query all providers with the shippingproviders endpoint
     * @var int
     * @DataField(name="ProviderId", type="int")
     */
    public $providerId;

    /**
     * The id of the shipping provider product to be used
     * @var int
     * @DataField(name="ProductId", type="int")
     */
    public $productId;

    /**
     * Optional parameter to automatically change the orderstate to sent after creating the shipment
     * @var bool
     * @DataField(name="ChangeStateToSend", type="bool")
     */
    public $changeStateToSend;

    /**
     * Optional the name of a connected cloudprinter to send the label to
     * @var string
     * @DataField(name="PrinterName", type="string")
     */
    public $printerName;

    /**
     * Optional the shipments weight in gram to override the calculated weight
     * @var int
     * @DataField(name="WeightInGram", type="int")
     */
    public $weightInGram;

    /**
     * Optional specify the shipdate to be transmitted to the carrier
     * @var \DateTime
     * @DataField(name="ShipDate", type="datetime")
     */
    public $shipDate;

    /**
     * Optional specify a reference text to be included on the label. Not all carriers support this option.
     * @var string
     * @DataField(name="ClientReference", type="string")
     */
    public $clientReference;

    /**
     * Option specify the dimensions of the package in cm
     * @var Dimensions
     * @DataField(name="Dimension", type="BillbeeDe\BillbeeAPI\Model\Dimensions")
     */
    public $dimension;
}
