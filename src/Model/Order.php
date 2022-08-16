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

use BillbeeDe\BillbeeAPI\Type\OrderState;
use BillbeeDe\BillbeeAPI\Type\PaymentType;
use JMS\Serializer\Annotation as Serializer;

class Order
{
    const VAT_MODE_DEFAULT = 0;
    const VAT_MODE_SMALL_BUSINESS = 1;
    const VAT_MODE_INTRA_COMMUNITY_DELIVERY = 2;
    const VAT_MODE_EXPORT_3RD_COUNTRY = 3;
    const VAT_MODE_DIFFERENTIAL_TAXATION = 4;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillBeeOrderId")
     */
    public $id;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillBeeParentOrderId")
     */
    public $parentOrderId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     */
    public $externalId;

    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\SerializedName("ShippingIds")
     */
    public $shipping;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("AcceptLossOfReturnRight")
     */
    public $acceptLossOfReturnRight;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderNumber")
     */
    public $orderNumber;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("State")
     */
    public $state = OrderState::ORDERED;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("VatMode")
     */
    public $vatMode = self::VAT_MODE_DEFAULT;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("CreatedAt")
     */
    public $createdAt = null;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("ShippedAt")
     */
    public $shippedAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("ConfirmedAt")
     */
    public $confirmedAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("PayedAt")
     */
    public $payedAt;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SellerComment")
     */
    public $sellerComment;

    /**
     * @var Comment[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Comment>")
     * @Serializer\SerializedName("Comments")
     */
    public $comments;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumberPrefix")
     */
    public $invoiceNumberPrefix;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumberPostfix")
     */
    public $invoiceNumberPostfix;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("InvoiceNumber")
     */
    public $invoiceNumber;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("InvoiceDate")
     */
    public $invoiceDate;

    /**
     * @var Address
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Address")
     * @Serializer\SerializedName("InvoiceAddress")
     */
    public $invoiceAddress;

    /**
     * @var Address
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Address")
     * @Serializer\SerializedName("ShippingAddress")
     */
    public $shippingAddress;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("PaymentMethod")
     *
     * @see PaymentType
     */
    public $paymentMethod;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ShippingCost")
     */
    public $shippingCost;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalCost")
     */
    public $totalCost;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("AdjustmentCost")
     */
    public $adjustmentCost;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AdjustmentReason")
     */
    public $adjustmentReason;

    /**
     * @var OrderItem[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\OrderItem>")
     * @Serializer\SerializedName("OrderItems")
     */
    public $orderItems;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Currency")
     */
    public $currency;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsCanceled")
     */
    public $isCanceled = false;

    /** Not Mapped */
    public $restfulPath;

    /**
     * @var Seller
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Seller")
     * @Serializer\SerializedName("Seller")
     */
    public $seller;

    /** Not Mapped */
    public $buyer;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("UpdatedAt")
     */
    public $updatedAt;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TaxRate1")
     */
    public $taxRate1;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TaxRate2")
     */
    public $taxRate2;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VatId")
     */
    public $vatId;

    /**
     * @var string[]
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Tags")
     */
    public $tags;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ShipWeightKg")
     */
    public $shipWeightKg;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LanguageCode")
     */
    public $languageCode;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PaidAmount")
     */
    public $paidAmount;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProfileId")
     * @deprecated remove in 2.0.0. Use Shipping $shippingProviderId or $shippingProviderProductId instead
     */
    public $shippingProfileId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingProfileName")
     * @deprecated remove in 2.0.0. Use Shipping $shippingProviderName or $shippingProviderProductName instead
     */
    public $shippingProfileName;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProviderId")
     */
    public $shippingProviderId;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProviderProductId")
     */
    public $shippingProviderProductId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingProviderName")
     */
    public $shippingProviderName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingProviderProductName")
     */
    public $shippingProviderProductName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentInstruction")
     */
    public $paymentInstruction;

    /** Not Mapped */
    public $isCancellationFor;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentTransactionId")
     */
    public $paymentTransactionId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DeliverySourceCountryCode")
     */
    public $deliverySourceCountryCode;

    /** Not Mapped */
    public $customInvoiceNote;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CustomerNumber")
     */
    public $customerNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DistributionCenter")
     */
    public $distributionCenter;

    /**
     * @var Customer
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Customer")
     * @Serializer\SerializedName("Customer")
     */
    public $customer;

    /**
     * @var Payment[]
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Payments")
     */
    public $payments;
}
