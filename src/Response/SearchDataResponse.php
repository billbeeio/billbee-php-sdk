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
use JMS\Serializer\Annotation as Serializer;

class SearchDataResponse
{
    /**
     * @var Search\ProductResult[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Search\ProductResult>")
     * @Serializer\SerializedName("Products")
     */
    public $products;

    /**
     * @var Search\OrderResult[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Search\OrderResult>")
     * @Serializer\SerializedName("Orders")
     */
    public $orders;

    /**
     * @var Search\CustomerResult[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Search\CustomerResult>")
     * @Serializer\SerializedName("Customers")
     */
    public $customers;
}
