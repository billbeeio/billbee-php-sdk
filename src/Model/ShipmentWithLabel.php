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

class ShipmentWithLabel
{
    /**
     * The Billbee internal id of the order to ship
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("OrderId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderId;

    /**
     * The id of the provider. You can query all providers with the shippingproviders endpoint
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ProviderId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $providerId;

    /**
     * The id of the shipping provider product to be used
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ProductId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $productId;

    /**
     * Optional parameter to automatically change the orderstate to sent after creating the shipment
     * @var ?bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("ChangeStateToSend")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $changeStateToSend;

    /**
     * Optional the name of a connected cloudprinter to send the label to
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PrinterName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $printerName;

    /**
     * Optional the shipments weight in gram to override the calculated weight
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("WeightInGram")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $weightInGram;

    /**
     * Optional specify the shipdate to be transmitted to the carrier
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("ShipDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shipDate;

    /**
     * Optional specify a reference text to be included on the label. Not all carriers support this option.
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ClientReference")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $clientReference;

    /**
     * Option specify the dimensions of the package in cm
     * @var ?Dimensions
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Dimensions")
     * @Serializer\SerializedName("Dimension")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $dimension;

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;
        return $this;
    }

    public function getProviderId(): int
    {
        return $this->providerId;
    }

    public function setProviderId(int $providerId): self
    {
        $this->providerId = $providerId;
        return $this;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function setProductId(int $productId): self
    {
        $this->productId = $productId;
        return $this;
    }

    public function getChangeStateToSend(): ?bool
    {
        return $this->changeStateToSend;
    }

    public function setChangeStateToSend(?bool $changeStateToSend): self
    {
        $this->changeStateToSend = $changeStateToSend;
        return $this;
    }

    public function getPrinterName(): ?string
    {
        return $this->printerName;
    }

    public function setPrinterName(?string $printerName): self
    {
        $this->printerName = $printerName;
        return $this;
    }

    public function getWeightInGram(): ?int
    {
        return $this->weightInGram;
    }

    public function setWeightInGram(?int $weightInGram): self
    {
        $this->weightInGram = $weightInGram;
        return $this;
    }

    public function getShipDate(): ?\DateTime
    {
        return $this->shipDate;
    }

    public function setShipDate(?\DateTime $shipDate): self
    {
        $this->shipDate = $shipDate;
        return $this;
    }

    public function getClientReference(): ?string
    {
        return $this->clientReference;
    }

    public function setClientReference(?string $clientReference): self
    {
        $this->clientReference = $clientReference;
        return $this;
    }

    public function getDimension(): ?Dimensions
    {
        return $this->dimension;
    }

    public function setDimension(?Dimensions $dimension): self
    {
        $this->dimension = $dimension;
        return $this;
    }
}
