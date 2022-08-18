<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
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
     *
     * @deprecated Use getter/setter instead. Will be protected in the next major version.
     */
    public $products;

    /**
     * @var Search\OrderResult[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Search\OrderResult>")
     * @Serializer\SerializedName("Orders")
     *
     * @deprecated Use getter/setter instead. Will be protected in the next major version.
     */
    public $orders;

    /**
     * @var Search\CustomerResult[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Search\CustomerResult>")
     * @Serializer\SerializedName("Customers")
     *
     * @deprecated Use getter/setter instead. Will be protected in the next major version.
     */
    public $customers;

    /**
     * @return Search\ProductResult[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Search\ProductResult[] $products
     * @return $this
     */
    public function setProducts(array $products): self
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return Search\OrderResult[]
     */
    public function getOrders(): array
    {
        return $this->orders;
    }

    /**
     * @param Search\OrderResult[] $orders
     */
    public function setOrders(array $orders): self
    {
        $this->orders = $orders;
        return $this;
    }

    /**
     * @return Search\CustomerResult[]
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }

    /**
     * @param Search\CustomerResult[] $customers
     * @return $this
     */
    public function setCustomers(array $customers): self
    {
        $this->customers = $customers;
        return $this;
    }
}
