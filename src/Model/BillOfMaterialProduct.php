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

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class BillOfMaterialProduct
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ArticleId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $articleId;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Amount")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $amount;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SKU")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sku;

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function setArticleId(int $articleId): self
    {
        $this->articleId = $articleId;
        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;
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
}
