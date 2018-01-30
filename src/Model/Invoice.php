<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2018 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\InvoiceType;
use MintWare\JOM\JsonField;

class Invoice
{
    /**
     * @var int
     * @JsonField(name="BillbeeId", type="int")
     */
    public $id;

    /**
     * @var string
     * @JsonField(name="InvoiceNumber", type="string")
     */
    public $invoiceNumber = null;

    /**
     * @var string
     * @JsonField(name="Type", type="string")
     *
     * @see InvoiceType
     */
    public $type = InvoiceType::INVOICE;

    /**
     * @var string
     * @JsonField(name="LastName", type="string")
     */
    public $lastName = null;

    /**
     * @var string
     * @JsonField(name="FirstName", type="string")
     */
    public $firstName = null;

    /**
     * @var string
     * @JsonField(name="Company", type="string")
     */
    public $company = null;

    /**
     * @var int
     * @JsonField(name="CustomerNumber", type="int")
     */
    public $customerNumber;

    /**
     * @var int
     * @JsonField(name="DebtorNumber", type="int")
     */
    public $debtorNumber;

    /**
     * @var \DateTime
     * @JsonField(name="InvoiceDate", type="datetime")
     */
    public $invoiceDate = null;

    /**
     * @var float
     * @JsonField(name="TotalNet", type="float")
     */
    public $totalNet = 0.00;

    /**
     * @var float
     * @JsonField(name="TotalGross", type="float")
     */
    public $totalGross = 0.00;

    /**
     * @var string
     * @JsonField(name="Currency", type="string")
     */
    public $currency = 'EUR';

    /**
     * @var int
     * @JsonField(name="PaymentTypeId", type="int")
     */
    public $paymentTypeId;

    /**
     * @var string
     * @JsonField(name="OrderNumber", type="string")
     */
    public $orderNumber = null;

    /**
     * @var string
     * @JsonField(name="TransactionId", type="string")
     */
    public $transactionId = null;

    /**
     * @var string
     * @JsonField(name="Email", type="string")
     */
    public $email = '';

    /**
     * @var string
     * @JsonField(name="ShopName", type="string")
     */
    public $shopName = null;

    /**
     * @var InvoicePosition[]
     * @JsonField(name="Positions", type="BillbeeDe\BillbeeAPI\Model\InvoicePosition[]")
     */
    public $positions = [];

    /**
     * @var \DateTime
     * @JsonField(name="PayDate", type="datetime")
     */
    public $payDate = null;

    /**
     * @var int
     * @JsonField(name="VatMode", type="int")
     */
    public $vatMode = Product::VAT_INDEX_NORMAL;
}
