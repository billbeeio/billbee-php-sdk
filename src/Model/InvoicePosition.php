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

use MintWare\DMM\DataField;

class InvoicePosition
{
    /**
     * @var int
     * @DataField(name="BillbeeId", type="int")
     */
    public $id;

    /**
     * @var int
     * @DataField(name="Position", type="int")
     */
    public $position;

    /**
     * @var float
     * @DataField(name="Amount", type="float")
     */
    public $amount = 0.00;

    /**
     * @var float
     * @DataField(name="Amount", type="float")
     */
    public $netValue = 0.00;

    /**
     * @var float
     * @DataField(name="TotalNetValue", type="float")
     */
    public $totalNetValue = 0.00;

    /**
     * @var float
     * @DataField(name="GrossValue", type="float")
     */
    public $grossValue = 0.00;

    /**
     * @var float
     * @DataField(name="TotalGrossValue", type="float")
     */
    public $totalGrossValue = 0.00;

    /**
     * @var float
     * @DataField(name="VatRate", type="float")
     */
    public $vatRate = 0.00;

    /**
     * @var int
     * @DataField(name="ArticleBillbeeId", type="int")
     */
    public $articleId;

    /**
     * @var string
     * @DataField(name="Sku", type="string")
     */
    public $sku = '';

    /**
     * @var string
     * @DataField(name="Title", type="string")
     */
    public $title = '';
}
