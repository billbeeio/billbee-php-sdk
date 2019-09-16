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
use BillbeeDe\BillbeeAPI\Type\PaymentType;
use MintWare\DMM\DataField;

class Order
{
    const VAT_MODE_DEFAULT = 0;
    const VAT_MODE_SMALL_BUSINESS = 1;
    const VAT_MODE_INTRA_COMMUNITY_DELIVERY = 2;
    const VAT_MODE_EXPORT_3RD_COUNTRY = 3;
    const VAT_MODE_DIFFERENTIAL_TAXATION = 4;

    /**
     * @var int
     * @DataField(name="BillBeeOrderId", type="int")
     */
    public $id;

    /**
     * @var int
     * @DataField(name="BillBeeParentOrderId", type="int")
     */
    public $parentOrderId;

    /**
     * @var string
     * @DataField(name="Id", type="string")
     */
    public $externalId;

    /**
     * @var array
     * @DataField(name="ShippingIds", type="array")
     */
    public $shipping;

    /**
     * @var bool
     * @DataField(name="AcceptLossOfReturnRight", type="bool")
     */
    public $acceptLossOfReturnRight;

    /**
     * @var string
     * @DataField(name="OrderNumber", type="string")
     */
    public $orderNumber;

    /**
     * @var int
     * @DataField(name="State", type="int")
     */
    public $state = OrderState::ORDERED;

    /**
     * @var int
     * @DataField(name="VatMode", type="int")
     */
    public $vatMode = self::VAT_MODE_DEFAULT;

    /**
     * @var \DateTime
     * @DataField(name="CreatedAt", type="datetime")
     */
    public $createdAt;

    /**
     * @var \DateTime
     * @DataField(name="ShippedAt", type="datetime")
     */
    public $shippedAt;

    /**
     * @var \DateTime
     * @DataField(name="ConfirmedAt", type="datetime")
     */
    public $confirmedAt;

    /**
     * @var \DateTime
     * @DataField(name="PayedAt", type="datetime")
     */
    public $payedAt;

    /**
     * @var string
     * @DataField(name="SellerComment", type="string")
     */
    public $sellerComment;

    /**
     * @var Comment[]
     * @DataField(name="Comments", type="BillbeeDe\BillbeeAPI\Model\Comment[]")
     */
    public $comments;

    /**
     * @var string
     * @DataField(name="InvoiceNumberPrefix", type="string")
     */
    public $invoiceNumberPrefix;

    /**
     * @var string
     * @DataField(name="InvoiceNumberPostfix", type="string")
     */
    public $invoiceNumberPostfix;

    /**
     * @var int
     * @DataField(name="InvoiceNumber", type="int")
     */
    public $invoiceNumber;

    /**
     * @var \DateTime
     * @DataField(name="InvoiceDate", type="datetime")
     */
    public $invoiceDate;

    /**
     * @var Address
     * @DataField(name="InvoiceAddress", type="BillbeeDe\BillbeeAPI\Model\Address")
     */
    public $invoiceAddress;

    /**
     * @var Address
     * @DataField(name="ShippingAddress", type="BillbeeDe\BillbeeAPI\Model\Address")
     */
    public $shippingAddress;

    /**
     * @var int
     * @DataField(name="PaymentMethod", type="int")
     *
     * @see PaymentType
     */
    public $paymentMethod;

    /**
     * @var float
     * @DataField(name="ShippingCost", type="float")
     */
    public $shippingCost;

    /**
     * @var float
     * @DataField(name="TotalCost", type="float")
     */
    public $totalCost;

    /**
     * @var float
     * @DataField(name="AdjustmentCost", type="float")
     */
    public $adjustmentCost;

    /**
     * @var string
     * @DataField(name="AdjustmentReason", type="string")
     */
    public $adjustmentReason;

    /**
     * @var OrderItem[]
     * @DataField(name="OrderItems", type="BillbeeDe\BillbeeAPI\Model\OrderItem[]")
     */
    public $orderItems;

    /**
     * @var string
     * @DataField(name="Currency", type="string")
     */
    public $currency;

    /**
     * @var bool
     * @DataField(name="IsCanceled", type="bool")
     */
    public $isCanceled = false;

    /** Not Mapped */
    public $restfulPath;

    /**
     * @var Seller
     * @DataField(name="Seller", type="BillbeeDe\BillbeeAPI\Model\Seller")
     */
    public $seller;

    /** Not Mapped */
    public $buyer;

    /**
     * @var \DateTime
     * @DataField(name="UpdatedAt", type="datetime")
     */
    public $updatedAt;

    /**
     * @var float
     * @DataField(name="TaxRate1", type="float")
     */
    public $taxRate1;

    /**
     * @var float
     * @DataField(name="TaxRate2", type="float")
     */
    public $taxRate2;

    /**
     * @var string
     * @DataField(name="VatId", type="string")
     */
    public $vatId;

    /**
     * @var string[]
     * @DataField(name="Tags", type="array")
     */
    public $tags;

    /**
     * @var float
     * @DataField(name="ShipWeightKg", type="float")
     */
    public $shipWeightKg;

    /**
     * @var string
     * @DataField(name="LanguageCode", type="string")
     */
    public $languageCode;

    /**
     * @var float
     * @DataField(name="PaidAmount", type="float")
     */
    public $paidAmount;

    /**
     * @var int
     * @DataField(name="ShippingProfileId", type="int")
     * @deprecated remove in 2.0.0. Use Shipping $shippingProviderId or $shippingProviderProductId instead
     */
    public $shippingProfileId;

    /**
     * @var string
     * @DataField(name="ShippingProfileName", type="string")
     * @deprecated remove in 2.0.0. Use Shipping $shippingProviderName or $shippingProviderProductName instead
     */
    public $shippingProfileName;

    /**
     * @var int
     * @DataField(name="ShippingProviderId", type="int")
     */
    public $shippingProviderId;

    /**
     * @var int
     * @DataField(name="ShippingProviderProductId", type="int")
     */
    public $shippingProviderProductId;

    /**
     * @var string
     * @DataField(name="ShippingProviderName", type="string")
     */
    public $shippingProviderName;

    /**
     * @var string
     * @DataField(name="ShippingProviderProductName", type="string")
     */
    public $shippingProviderProductName;

    /**
     * @var string
     * @DataField(name="PaymentInstruction", type="string")
     */
    public $paymentInstruction;

    /** Not Mapped */
    public $isCancellationFor;

    /**
     * @var string
     * @DataField(name="PaymentTransactionId", type="string")
     */
    public $paymentTransactionId;

    /**
     * @var string
     * @DataField(name="DeliverySourceCountryCode", type="string")
     */
    public $deliverySourceCountryCode;

    /** Not Mapped */
    public $customInvoiceNote;

    /**
     * @var string
     * @DataField(name="CustomerNumber", type="string")
     */
    public $customerNumber;

    /**
     * @var string
     * @DataField(name="DistributionCenter", type="string")
     */
    public $distributionCenter;

    /**
     * @var Customer
     * @DataField(name="Customer", type="BillbeeDe\BillbeeAPI\Model\Customer")
     */
    public $customer;
}
