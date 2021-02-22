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

use BillbeeDe\BillbeeAPI\Type\InvoiceType;
use MintWare\DMM\DataField;

class Invoice
{
    /**
     * @var int
     * @DataField(name="BillbeeId", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="InvoiceNumber", type="string")
     */
    public $invoiceNumber = null;

    /**
     * @var string
     * @DataField(name="Type", type="string")
     *
     * @see InvoiceType
     */
    public $type = InvoiceType::INVOICE;

    /**
     * @var string
     * @DataField(name="LastName", type="string")
     */
    public $lastName = null;

    /**
     * @var string
     * @DataField(name="FirstName", type="string")
     */
    public $firstName = null;

    /**
     * @var string
     * @DataField(name="Company", type="string")
     */
    public $company = null;

    /**
     * @var int
     * @DataField(name="CustomerNumber", type="int")
     */
    public $customerNumber;

    /**
     * @var int
     * @DataField(name="DebtorNumber", type="int")
     */
    public $debtorNumber;

    /**
     * @var \DateTime
     * @DataField(name="InvoiceDate", type="datetime")
     */
    public $invoiceDate = null;

    /**
     * @var float
     * @DataField(name="TotalNet", type="float")
     */
    public $totalNet = 0.00;

    /**
     * @var float
     * @DataField(name="TotalGross", type="float")
     */
    public $totalGross = 0.00;

    /**
     * @var string
     * @DataField(name="Currency", type="string")
     */
    public $currency = 'EUR';

    /**
     * @var int
     * @DataField(name="PaymentTypeId", type="int")
     */
    public $paymentTypeId;

    /**
     * @var string
     * @DataField(name="OrderNumber", type="string")
     */
    public $orderNumber = null;

    /**
     * @var string
     * @DataField(name="TransactionId", type="string")
     */
    public $transactionId = null;

    /**
     * @var string
     * @DataField(name="Email", type="string")
     */
    public $email = '';

    /**
     * @var string
     * @DataField(name="ShopName", type="string")
     */
    public $shopName = null;

    /**
     * @var InvoicePosition[]
     * @DataField(name="Positions", type="BillbeeDe\BillbeeAPI\Model\InvoicePosition[]")
     */
    public $positions = [];

    /**
     * @var \DateTime
     * @DataField(name="PayDate", type="datetime")
     */
    public $payDate = null;

    /**
     * @var int
     * @DataField(name="VatMode", type="int")
     */
    public $vatMode = Product::VAT_INDEX_NORMAL;
}
