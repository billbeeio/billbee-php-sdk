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

use MintWare\JOM\JsonField;

class OrderItem
{
    /**
     * @var int
     * @JsonField(name="BillbeeId", type="int")
     */
    public $billbeeId;

    /**
     * @var string
     * @JsonField(name="TransactionId", type="string")
     */
    public $transactionId;

    /**
     * @var object
     * @JsonField(name="Product", type="object")
     */
    public $product;

    /**
     * @var float
     * @JsonField(name="Quantity", type="float")
     */
    public $quantity;

    /**
     * @var float
     * @JsonField(name="TotalPrice", type="float")
     */
    public $totalPrice;

    /**
     * @var float
     * @JsonField(name="TaxAmount", type="float")
     */
    public $taxAmount;

    /**
     * @var int
     * @JsonField(name="TaxIndex", type="int")
     */
    public $taxIndex;

    /**
     * @var float
     * @JsonField(name="Discount", type="float")
     */
    public $discount;

    /**
     * @var OrderItemAttribute[]
     * @JsonField(name="Attributes", type="BillbeeDe\BillbeeAPI\Model\OrderItemAttribute[]")
     */
    public $attributes;

    /**
     * @var bool
     * @JsonField(name="GetPriceFromArticleIfAny", type="bool")
     */
    public $getPriceFromArticleIfAny = false;

    /**
     * @var bool
     * @JsonField(name="IsCoupon", type="bool")
     */
    public $isCoupon = false;

    /** Not Mapped */
    public $shippingProfileId;

    /**
     * @var bool
     * @JsonField(name="DontAdjustStock", type="bool")
     */
    public $dontAdjustStock;
}
