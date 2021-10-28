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

namespace BillbeeDe\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Search;
use MintWare\DMM\DataField;

class SearchDataResponse
{
    /**
     * @var Search\ProductResult[]
     * @DataField(name="Products", type="BillbeeDe\BillbeeAPI\Model\Search\ProductResult[]")
     */
    public $products;

    /**
     * @var Search\OrderResult[]
     * @DataField(name="Orders", type="BillbeeDe\BillbeeAPI\Model\Search\OrderResult[]")
     */
    public $orders;

    /**
     * @var Search\CustomerResult[]
     * @DataField(name="Customers", type="BillbeeDe\BillbeeAPI\Model\Search\CustomerResult[]")
     */
    public $customers;
}
