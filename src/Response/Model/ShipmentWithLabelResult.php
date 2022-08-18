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

namespace BillbeeDe\BillbeeAPI\Response\Model;

use JMS\Serializer\Annotation as Serializer;

class ShipmentWithLabelResult
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("OrderId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderReference")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderReference;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippingId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TrackingUrl")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $trackingUrl;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LabelDataPdf")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $labelDataPdf;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ExportDocsPdf")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $exportDocsPdf;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Carrier")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $carrier;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *             Field will be a DateTime object in the next major version.
     */
    public $shippingDate;

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getOrderReference(): ?string
    {
        return $this->orderReference;
    }

    public function setOrderReference(?string $orderReference): self
    {
        $this->orderReference = $orderReference;
        return $this;
    }

    public function getShippingId(): ?string
    {
        return $this->shippingId;
    }

    public function setShippingId(?string $shippingId): self
    {
        $this->shippingId = $shippingId;
        return $this;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }

    public function setTrackingUrl(?string $trackingUrl): self
    {
        $this->trackingUrl = $trackingUrl;
        return $this;
    }

    public function getLabelDataPdf(): ?string
    {
        return $this->labelDataPdf;
    }

    public function setLabelDataPdf(?string $labelDataPdf): self
    {
        $this->labelDataPdf = $labelDataPdf;
        return $this;
    }

    public function getExportDocsPdf(): ?string
    {
        return $this->exportDocsPdf;
    }

    public function setExportDocsPdf(?string $exportDocsPdf): self
    {
        $this->exportDocsPdf = $exportDocsPdf;
        return $this;
    }

    public function getCarrier(): ?string
    {
        return $this->carrier;
    }

    public function setCarrier(?string $carrier): self
    {
        $this->carrier = $carrier;
        return $this;
    }

    public function getShippingDate(): ?string
    {
        return $this->shippingDate;
    }

    public function setShippingDate(?string $shippingDate): self
    {
        $this->shippingDate = $shippingDate;
        return $this;
    }
}
