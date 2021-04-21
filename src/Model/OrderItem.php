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

use MintWare\DMM\DataField;

class OrderItem
{
    /**
     * @var int
     * @DataField(name="BillbeeId", type="int")
     */
    public $billbeeId;

    /**
     * @var string
     * @DataField(name="TransactionId", type="string")
     */
    public $transactionId;

    /**
     * @var SoldProduct
     * @DataField(name="Product", type="BillbeeDe\BillbeeAPI\Model\SoldProduct")
     */
    public $product;

    /**
     * @var float
     * @DataField(name="Quantity", type="float")
     */
    public $quantity;

    /**
     * @var float
     * @DataField(name="TotalPrice", type="float")
     */
    public $totalPrice;

    /**
     * @var float
     * @DataField(name="UnrebatedTotalPrice", type="float")
     */
    public $unrebatedTotalPrice;

    /**
     * @var float
     * @DataField(name="TaxAmount", type="float")
     */
    public $taxAmount;

    /**
     * @var int
     * @DataField(name="TaxIndex", type="int")
     */
    public $taxIndex;

    /**
     * @var float
     * @DataField(name="Discount", type="float")
     */
    public $discount;

    /**
     * @var OrderItemAttribute[]
     * @DataField(name="Attributes", type="BillbeeDe\BillbeeAPI\Model\OrderItemAttribute[]")
     */
    public $attributes;

    /**
     * @var bool
     * @DataField(name="GetPriceFromArticleIfAny", type="bool")
     */
    public $getPriceFromArticleIfAny = false;

    /**
     * @var bool
     * @DataField(name="IsCoupon", type="bool")
     */
    public $isCoupon = false;

    /** Not Mapped */
    public $shippingProfileId;

    /**
     * @var bool
     * @DataField(name="DontAdjustStock", type="bool")
     */
    public $dontAdjustStock;

    /**
     * Contains the used serial number
     *
     * @var string
     * @DataField(name="SerialNumber", type="string")
     */
    public $serialNumber;
}
