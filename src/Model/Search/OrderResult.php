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

class OrderResult
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
     * @Serializer\SerializedName("ExternalReference")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $externalReference = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("BuyerName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $buyerName = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceNumber = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CustomerName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $customerName = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ArticleTexts")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $articleTexts = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getExternalReference(): string
    {
        return $this->externalReference;
    }

    public function setExternalReference(string $externalReference): self
    {
        $this->externalReference = $externalReference;
        return $this;
    }

    public function getBuyerName(): string
    {
        return $this->buyerName;
    }

    public function setBuyerName(string $buyerName): self
    {
        $this->buyerName = $buyerName;
        return $this;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(string $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function getCustomerName(): string
    {
        return $this->customerName;
    }

    public function setCustomerName(string $customerName): self
    {
        $this->customerName = $customerName;
        return $this;
    }

    public function getArticleTexts(): string
    {
        return $this->articleTexts;
    }

    public function setArticleTexts(string $articleTexts): self
    {
        $this->articleTexts = $articleTexts;
        return $this;
    }
}
