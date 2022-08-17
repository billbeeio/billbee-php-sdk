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

use BillbeeDe\BillbeeAPI\Type\OrderState;
use JMS\Serializer\Annotation as Serializer;

class PartnerOrder
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ExternalId")
     */
    public $externalId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumber")
     */
    public $invoiceNumber;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("InvoiceCreatedAt")
     */
    public $invoiceCreatedAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("InvoiceDate")
     */
    public $invoiceDate;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("CreatedAt")
     */
    public $createdAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("PaidAt")
     */
    public $paidAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("ShippedAt")
     */
    public $shippedAt;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("HasInvoice")
     */
    public $hasInvoice = false;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("OrderStateId")
     * @see OrderState
     */
    public $orderStateId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderStateText")
     */
    public $orderStateText;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalGross")
     */
    public $totalGross;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShopName")
     */
    public $shopName;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("CanCreateAutoInvoice")
     */
    public $canCreateAutoInvoice = false;
}
