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

use JMS\Serializer\Annotation as Serializer;

class InvoicePosition
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     */
    public $id;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Position")
     */
    public $position;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Amount")
     */
    public $amount = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Amount")
     */
    public $netValue = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalNetValue")
     */
    public $totalNetValue = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("GrossValue")
     */
    public $grossValue = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalGrossValue")
     */
    public $totalGrossValue = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("VatRate")
     */
    public $vatRate = 0.00;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ArticleBillbeeId")
     */
    public $articleId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Sku")
     */
    public $sku = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Title")
     */
    public $title = '';
}
