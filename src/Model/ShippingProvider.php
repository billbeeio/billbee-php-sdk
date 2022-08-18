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

class ShippingProvider
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("name")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $name;

    /**
     * @var ShippingProduct[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\ShippingProduct>")
     * @Serializer\SerializedName("products")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $products = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /** @return ShippingProduct[] */
    public function getProducts(): array
    {
        return $this->products;
    }

    /** @param ShippingProduct[] $products */
    public function setProducts(array $products): self
    {
        $this->products = $products;
        return $this;
    }
}
