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

namespace BillbeeDe\BillbeeAPI\Response\Model;

use MintWare\DMM\DataField;

class ShipmentWithLabelResult
{
    /**
     * @var int
     * @DataField(name="OrderId", type="int")
     */
    public $orderId;

    /**
     * @var string
     * @DataField(name="OrderReference", type="string")
     */
    public $orderReference;

    /**
     * @var string
     * @DataField(name="ShippingId", type="string")
     */
    public $shippingId;

    /**
     * @var string
     * @DataField(name="TrackingUrl", type="string")
     */
    public $trackingUrl;

    /**
     * @var string
     * @DataField(name="LabelDataPdf", type="string")
     */
    public $labelDataPdf;

    /**
     * @var string
     * @DataField(name="ExportDocsPdf", type="string")
     */
    public $exportDocsPdf;

    /**
     * @var string
     * @DataField(name="Carrier", type="string")
     */
    public $carrier;

    /**
     * @var string
     * @DataField(name="ShippingDate", type="string")
     */
    public $shippingDate;
}
