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

class DeliveryNoteDocument
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DeliveryNoteNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $deliveryNoteNumber;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PDFData")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $pdfData;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s'>")
     * @Serializer\SerializedName("DeliveryNoteDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $deliveryNoteDate;

    /**
     * @var string|null
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PdfDownloadUrl")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $pdfDownloadUrl;

    public function getOrderNumber(): string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;
        return $this;
    }

    public function getDeliveryNoteNumber(): string
    {
        return $this->deliveryNoteNumber;
    }

    public function setDeliveryNoteNumber(string $deliveryNoteNumber): self
    {
        $this->deliveryNoteNumber = $deliveryNoteNumber;
        return $this;
    }

    public function getPdfData(): ?string
    {
        return $this->pdfData;
    }

    public function setPdfData(?string $pdfData): self
    {
        $this->pdfData = $pdfData;
        return $this;
    }

    public function getDeliveryNoteDate(): \DateTime
    {
        return $this->deliveryNoteDate;
    }

    public function setDeliveryNoteDate(\DateTime $deliveryNoteDate): self
    {
        $this->deliveryNoteDate = $deliveryNoteDate;
        return $this;
    }

    public function getPdfDownloadUrl(): ?string
    {
        return $this->pdfDownloadUrl;
    }

    public function setPdfDownloadUrl(?string $pdfDownloadUrl): self
    {
        $this->pdfDownloadUrl = $pdfDownloadUrl;
        return $this;
    }
}
