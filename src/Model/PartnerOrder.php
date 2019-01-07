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

use BillbeeDe\BillbeeAPI\Type\OrderState;
use MintWare\DMM\DataField;

class PartnerOrder
{
    /**
     * @var int
     * @DataField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="ExternalId", type="string")
     */
    public $externalId;

    /**
     * @var string
     * @DataField(name="InvoiceNumber", type="string")
     */
    public $invoiceNumber;

    /**
     * @var \DateTime
     * @DataField(name="InvoiceCreatedAt", type="datetime")
     */
    public $invoiceCreatedAt;

    /**
     * @var \DateTime
     * @DataField(name="InvoiceDate", type="datetime")
     */
    public $invoiceDate;

    /**
     * @var \DateTime
     * @DataField(name="CreatedAt", type="datetime")
     */
    public $createdAt;

    /**
     * @var \DateTime
     * @DataField(name="PaidAt", type="datetime")
     */
    public $paidAt;

    /**
     * @var \DateTime
     * @DataField(name="ShippedAt", type="datetime")
     */
    public $shippedAt;

    /**
     * @var bool
     * @DataField(name="HasInvoice", type="bool")
     */
    public $hasInvoice = false;

    /**
     * @var int
     * @DataField(name="OrderStateId", type="int")
     * @see OrderState
     */
    public $orderStateId;

    /**
     * @var string
     * @DataField(name="OrderStateText", type="string")
     */
    public $orderStateText;

    /**
     * @var float
     * @DataField(name="TotalGross", type="float")
     */
    public $totalGross;

    /**
     * @var string
     * @DataField(name="ShopName", type="string")
     */
    public $shopName;

    /**
     * @var bool
     * @DataField(name="CanCreateAutoInvoice", type="bool")
     */
    public $canCreateAutoInvoice = false;
}
