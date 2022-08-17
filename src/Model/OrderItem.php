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

use JMS\Serializer\Annotation as Serializer;

class OrderItem
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     */
    public $billbeeId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TransactionId")
     */
    public $transactionId;

    /**
     * @var SoldProduct
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\SoldProduct")
     * @Serializer\SerializedName("Product")
     */
    public $product;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Quantity")
     */
    public $quantity;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalPrice")
     */
    public $totalPrice;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("UnrebatedTotalPrice")
     */
    public $unrebatedTotalPrice;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TaxAmount")
     */
    public $taxAmount;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("TaxIndex")
     */
    public $taxIndex;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Discount")
     */
    public $discount;

    /**
     * @var OrderItemAttribute[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\OrderItemAttribute>")
     * @Serializer\SerializedName("Attributes")
     */
    public $attributes;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("GetPriceFromArticleIfAny")
     */
    public $getPriceFromArticleIfAny = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsCoupon")
     */
    public $isCoupon = false;

    /** Not Mapped */
    public $shippingProfileId;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("DontAdjustStock")
     */
    public $dontAdjustStock;

    /**
     * Contains the used serial number
     *
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SerialNumber")
     */
    public $serialNumber;
}
