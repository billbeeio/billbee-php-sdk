<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Model\Search;

use MintWare\DMM\DataField;

class OrderResult
{
    /**
     * @var int
     * @DataField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="ExternalReference", type="string")
     */
    public $externalReference = '';

    /**
     * @var string
     * @DataField(name="BuyerName", type="string")
     */
    public $buyerName = '';

    /**
     * @var string
     * @DataField(name="InvoiceNumber", type="string")
     */
    public $invoiceNumber = '';

    /**
     * @var string
     * @DataField(name="CustomerName", type="string")
     */
    public $customerName = '';

    /**
     * @var string
     * @DataField(name="ArticleTexts", type="string")
     */
    public $articleTexts = '';
}
