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

use BillbeeDe\BillbeeAPI\Type\OrderState;
use MintWare\JOM\JsonField;

class PartnerOrder
{
    /**
     * @var int
     * @JsonField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @JsonField(name="ExternalId", type="string")
     */
    public $externalId;

    /**
     * @var string
     * @JsonField(name="InvoiceNumber", type="string")
     */
    public $invoiceNumber;

    /**
     * @var \DateTime
     * @JsonField(name="InvoiceCreatedAt", type="datetime")
     */
    public $invoiceCreatedAt;

    /**
     * @var \DateTime
     * @JsonField(name="InvoiceDate", type="datetime")
     */
    public $invoiceDate;

    /**
     * @var \DateTime
     * @JsonField(name="CreatedAt", type="datetime")
     */
    public $createdAt;

    /**
     * @var bool
     * @JsonField(name="PaidAt", type="bool")
     */
    public $paidAt;

    /**
     * @var \DateTime
     * @JsonField(name="ShippedAt", type="datetime")
     */
    public $shippedAt;

    /**
     * @var bool
     * @JsonField(name="HasInvoice", type="bool")
     */
    public $hasInvoice = false;

    /**
     * @var int
     * @JsonField(name="OrderStateId", type="int")
     * @see OrderState
     */
    public $orderStateId;

    /**
     * @var string
     * @JsonField(name="OrderStateText", type="string")
     */
    public $orderStateText;

    /**
     * @var float
     * @JsonField(name="TotalGross", type="float")
     */
    public $totalGross;

    /**
     * @var string
     * @JsonField(name="ShopName", type="string")
     */
    public $shopName;

    /**
     * @var bool
     * @JsonField(name="CanCreateAutoInvoice", type="bool")
     */
    public $canCreateAutoInvoice = false;
}