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
use BillbeeDe\BillbeeAPI\Type\ShippingCarrier;
use BillbeeDe\BillbeeAPI\Type\ShipmentType;
use JMS\Serializer\Annotation as Serializer;

class Shipment
{

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $billbeeId;

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
     * @Serializer\SerializedName("Shipper")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shipper;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("Created")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $created;

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
     * @Serializer\SerializedName("OrderId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Comment")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $comment;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProviderId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippingProviderId;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProviderProductId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippingProductId;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingCarrier")
     * *
     * * @see \BillbeeDe\BillbeeAPI\Type\ShippingCarrier
     */
    private $shippingCarrier;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShipmentType")
     *
     * @see \BillbeeDe\BillbeeAPI\Type\ShipmentType
     */
    private $shipmentType;


    /**
     * Creates a shipment based on models
     *
     * @param ShippingProvider $provider The provider
     * @param ShippingProduct $product The product
     * @return Shipment The Shipment
     */
    public static function fromProviderAndProduct(ShippingProvider $provider, ShippingProduct $product): Shipment
    {
        return (new Shipment())
            ->setShippingProviderId($provider->getId())
            ->setShippingProductId($product->getId());
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

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function setOrderId(?string $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    public function getShippingProviderId(): ?int
    {
        return $this->shippingProviderId;
    }

    public function setShippingProviderId(?int $shippingProviderId): self
    {
        $this->shippingProviderId = $shippingProviderId;
        return $this;
    }

    public function getShippingProductId(): ?int
    {
        return $this->shippingProductId;
    }

    public function setShippingProductId(?int $shippingProductId): self
    {
        $this->shippingProductId = $shippingProductId;
        return $this;
    }

    public function getShippingCarrier(): ?int
    {
        return $this->shippingCarrier;
    }

    public function setShippingCarrier(?int $shippingCarrier): self
    {
        $this->shippingCarrier = $shippingCarrier;
        return $this;
    }

    public function getShipmentType(): ?int
    {
        return $this->shipmentType;
    }

    public function setShipmentType(?int $shipmentType): self
    {
        $this->shipmentType = $shipmentType;
        return $this;
    }

    public function getBillbeeId(): ?int
    {
        return $this->billbeeId;
    }

    public function getShipper(): ?string
    {
        return $this->shipper;
    }

    public function getCreated(): ?\DateTime
    {
        return $this->created;
    }

    public function getTrackingUrl(): ?string
    {
        return $this->trackingUrl;
    }
}
