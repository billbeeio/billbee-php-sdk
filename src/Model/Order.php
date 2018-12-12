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

use BillbeeDe\BillbeeAPI\Type\OrderState;
use BillbeeDe\BillbeeAPI\Type\PaymentType;
use MintWare\JOM\JsonField;

class Order
{
    /**
     * @var int
     * @JsonField(name="BillBeeOrderId", type="int")
     */
    public $id;

    /**
     * @var int
     * @JsonField(name="BillBeeParentOrderId", type="int")
     */
    public $parentOrderId;

    /**
     * @var string
     * @JsonField(name="Id", type="string")
     */
    public $externalId;

    /**
     * @var array
     * @JsonField(name="ShippingIds", type="array")
     */
    public $shipping;

    /**
     * @var bool
     * @JsonField(name="AcceptLossOfReturnRight", type="bool")
     */
    public $acceptLossOfReturnRight;

    /**
     * @var string
     * @JsonField(name="OrderNumber", type="string")
     */
    public $orderNumber;

    /**
     * @var int
     * @JsonField(name="State", type="int")
     */
    public $state = OrderState::ORDERED;

    /**
     * @var int
     * @JsonField(name="VatMode", type="int")
     */
    public $vatMode = Product::VAT_INDEX_NORMAL;

    /**
     * @var \DateTime
     * @JsonField(name="CreatedAt", type="datetime")
     */
    public $createdAt;

    /**
     * @var \DateTime
     * @JsonField(name="ShippedAt", type="datetime")
     */
    public $shippedAt;

    /**
     * @var \DateTime
     * @JsonField(name="ConfirmedAt", type="datetime")
     */
    public $confirmedAt;

    /**
     * @var \DateTime
     * @JsonField(name="PayedAt", type="datetime")
     */
    public $payedAt;

    /**
     * @var string
     * @JsonField(name="SellerComment", type="string")
     */
    public $sellerComment;

    /**
     * @var Comment[]
     * @JsonField(name="Comments", type="BillbeeDe\BillbeeAPI\Model\Comment[]")
     */
    public $comments;

    /**
     * @var string
     * @JsonField(name="InvoiceNumberPrefix", type="string")
     */
    public $invoiceNumberPrefix;

    /**
     * @var string
     * @JsonField(name="InvoiceNumberPostfix", type="string")
     */
    public $invoiceNumberPostfix;

    /**
     * @var int
     * @JsonField(name="InvoiceNumber", type="int")
     */
    public $invoiceNumber;

    /**
     * @var \DateTime
     * @JsonField(name="InvoiceDate", type="datetime")
     */
    public $invoiceDate;

    /**
     * @var Address
     * @JsonField(name="InvoiceAddress", type="BillbeeDe\BillbeeAPI\Model\Address")
     */
    public $invoiceAddress;

    /**
     * @var Address
     * @JsonField(name="ShippingAddress", type="BillbeeDe\BillbeeAPI\Model\Address")
     */
    public $shippingAddress;

    /**
     * @var int
     * @JsonField(name="PaymentMethod", type="int")
     *
     * @see PaymentType
     */
    public $paymentMethod;

    /**
     * @var float
     * @JsonField(name="ShippingCost", type="float")
     */
    public $shippingCost;

    /**
     * @var float
     * @JsonField(name="TotalCost", type="float")
     */
    public $totalCost;

    /**
     * @var float
     * @JsonField(name="AdjustmentCost", type="float")
     */
    public $adjustmentCost;

    /**
     * @var string
     * @JsonField(name="AdjustmentReason", type="string")
     */
    public $adjustmentReason;

    /**
     * @var OrderItem[]
     * @JsonField(name="OrderItems", type="BillbeeDe\BillbeeAPI\Model\OrderItem[]")
     */
    public $orderItems;

    /**
     * @var string
     * @JsonField(name="Currency", type="string")
     */
    public $currency;

    /**
     * @var bool
     * @JsonField(name="IsCanceled", type="bool")
     */
    public $isCanceled = false;

    /** Not Mapped */
    public $restfulPath;

    /**
     * @var Seller
     * @JsonField(name="Seller", type="BillbeeDe\BillbeeAPI\Model\Seller")
     */
    public $seller;

    /** Not Mapped */
    public $buyer;

    /**
     * @var \DateTime
     * @JsonField(name="UpdatedAt", type="datetime")
     */
    public $updatedAt;

    /**
     * @var float
     * @JsonField(name="TaxRate1", type="float")
     */
    public $taxRate1;

    /**
     * @var float
     * @JsonField(name="TaxRate2", type="float")
     */
    public $taxRate2;

    /**
     * @var string
     * @JsonField(name="VatId", type="string")
     */
    public $vatId;

    /**
     * @var string[]
     * @JsonField(name="Tags", type="array")
     */
    public $tags;

    /**
     * @var float
     * @JsonField(name="ShipWeightKg", type="float")
     */
    public $shipWeightKg;

    /**
     * @var string
     * @JsonField(name="LanguageCode", type="string")
     */
    public $languageCode;

    /**
     * @var float
     * @JsonField(name="PaidAmount", type="float")
     */
    public $paidAmount;

    /**
     * @var int
     * @JsonField(name="ShippingProfileId", type="int")
     * @deprecated remove in 2.0.0. Use Shipping $shippingProviderId or $shippingProviderProductId instead
     */
    public $shippingProfileId;

    /**
     * @var string
     * @JsonField(name="ShippingProfileName", type="string")
     * @deprecated remove in 2.0.0. Use Shipping $shippingProviderName or $shippingProviderProductName instead
     */
    public $shippingProfileName;

    /**
     * @var int
     * @JsonField(name="ShippingProviderId", type="int")
     */
    public $shippingProviderId;

    /**
     * @var int
     * @JsonField(name="ShippingProviderProductId", type="int")
     */
    public $shippingProviderProductId;

    /**
     * @var string
     * @JsonField(name="ShippingProviderName", type="string")
     */
    public $shippingProviderName;

    /**
     * @var string
     * @JsonField(name="ShippingProviderProductName", type="string")
     */
    public $shippingProviderProductName;

    /**
     * @var string
     * @JsonField(name="PaymentInstruction", type="string")
     */
    public $paymentInstruction;

    /** Not Mapped */
    public $isCancellationFor;

    /** Not Mapped */
    public $paymentTransactionId;

    /** Not Mapped */
    public $deliverySourceCountryCode;

    /** Not Mapped */
    public $customInvoiceNote;

    /**
     * @var string
     * @JsonField(name="CustomerNumber", type="string")
     */
    public $customerNumber;

    /**
     * @var string
     * @JsonField(name="DistributionCenter", type="string")
     */
    public $distributionCenter;
}
