<?php

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class StockProduct
{
    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     */
    private $name;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("StockId")
     */
    private $stockId;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockCurrent")
     */
    private $stockCurrent;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockWarning")
     */
    private $stockWarning;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("StockCode")
     */
    private $stockCode;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("UnfulfilledAmount")
     */
    private $unfulfilledAmount;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockDesired")
     */
    private $stockDesired;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getStockId(): int
    {
        return $this->stockId;
    }

    public function setStockId(int $stockId): self
    {
        $this->stockId = $stockId;
        return $this;
    }

    public function getStockCurrent(): ?float
    {
        return $this->stockCurrent;
    }

    public function setStockCurrent(?float $stockCurrent): self
    {
        $this->stockCurrent = $stockCurrent;
        return $this;
    }

    public function getStockWarning(): ?float
    {
        return $this->stockWarning;
    }

    public function setStockWarning(?float $stockWarning): self
    {
        $this->stockWarning = $stockWarning;
        return $this;
    }

    public function getStockCode(): ?string
    {
        return $this->stockCode;
    }

    public function setStockCode(?string $stockCode): self
    {
        $this->stockCode = $stockCode;
        return $this;
    }

    public function getUnfulfilledAmount(): ?float
    {
        return $this->unfulfilledAmount;
    }

    public function setUnfulfilledAmount(?float $unfulfilledAmount): self
    {
        $this->unfulfilledAmount = $unfulfilledAmount;
        return $this;
    }

    public function getStockDesired(): ?float
    {
        return $this->stockDesired;
    }

    public function setStockDesired(?float $stockDesired): self
    {
        $this->stockDesired = $stockDesired;
        return $this;
    }
}
