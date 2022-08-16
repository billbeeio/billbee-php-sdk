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

use JMS\Serializer\Annotation as Serializer;

class ProductResult
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShortText")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shortText = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SKU")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sku = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tags")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $tags = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getShortText(): string
    {
        return $this->shortText;
    }

    public function setShortText(string $shortText): self
    {
        $this->shortText = $shortText;
        return $this;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    public function getTags(): string
    {
        return $this->tags;
    }

    public function setTags(string $tags): self
    {
        $this->tags = $tags;
        return $this;
    }
}
