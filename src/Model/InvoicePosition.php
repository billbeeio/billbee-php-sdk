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

class InvoicePosition
{
    /**
     * @var int
     * @JsonField(name="BillbeeId", type="int")
     */
    public $id;

    /**
     * @var int
     * @JsonField(name="Position", type="int")
     */
    public $position;

    /**
     * @var float
     * @JsonField(name="Amount", type="float")
     */
    public $amount = 0.00;

    /**
     * @var float
     * @JsonField(name="Amount", type="float")
     */
    public $netValue = 0.00;

    /**
     * @var float
     * @JsonField(name="TotalNetValue", type="float")
     */
    public $totalNetValue = 0.00;

    /**
     * @var float
     * @JsonField(name="GrossValue", type="float")
     */
    public $grossValue = 0.00;

    /**
     * @var float
     * @JsonField(name="TotalGrossValue", type="float")
     */
    public $totalGrossValue = 0.00;

    /**
     * @var float
     * @JsonField(name="VatRate", type="float")
     */
    public $vatRate = 0.00;

    /**
     * @var int
     * @JsonField(name="ArticleBillbeeId", type="int")
     */
    public $articleId;

    /**
     * @var string
     * @JsonField(name="Sku", type="string")
     */
    public $sku = '';

    /**
     * @var string
     * @JsonField(name="Title", type="string")
     */
    public $title = '';
}
