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

namespace BillbeeDe\BillbeeAPI\Response\Model;

use JMS\Serializer\Annotation as Serializer;

class ShipmentWithLabelResult
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("OrderId")
     */
    public $orderId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderReference")
     */
    public $orderReference;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingId")
     */
    public $shippingId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TrackingUrl")
     */
    public $trackingUrl;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LabelDataPdf")
     */
    public $labelDataPdf;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ExportDocsPdf")
     */
    public $exportDocsPdf;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Carrier")
     */
    public $carrier;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingDate")
     */
    public $shippingDate;
}
