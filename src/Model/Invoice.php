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
use JMS\Serializer\Annotation as Serializer;

class Invoice
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumber")
     */
    public $invoiceNumber = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Type")
     *
     * @see InvoiceType
     */
    public $type = InvoiceType::INVOICE;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LastName")
     */
    public $lastName = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FirstName")
     */
    public $firstName = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Company")
     */
    public $company = null;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("CustomerNumber")
     */
    public $customerNumber;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("DebtorNumber")
     */
    public $debtorNumber;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("InvoiceDate")
     */
    public $invoiceDate = null;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalNet")
     */
    public $totalNet = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalGross")
     */
    public $totalGross = 0.00;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Currency")
     */
    public $currency = 'EUR';

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("PaymentTypeId")
     */
    public $paymentTypeId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderNumber")
     */
    public $orderNumber = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TransactionId")
     */
    public $transactionId = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Email")
     */
    public $email = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShopName")
     */
    public $shopName = null;

    /**
     * @var InvoicePosition[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\InvoicePosition>")
     * @Serializer\SerializedName("Positions")
     */
    public $positions = [];

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("PayDate")
     */
    public $payDate = null;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("VatMode")
     */
    public $vatMode = Product::VAT_INDEX_NORMAL;
}
