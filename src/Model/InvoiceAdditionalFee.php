<?php

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class InvoiceAdditionalFee
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Type")
     */
    private $type = '';

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Gross")
     */
    private $gross = 0.0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Net")
     */
    private $net = 0.0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("VatAmount")
     */
    private $vatAmount = 0.0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("VatRate")
     */
    private $vatRate = 0.0;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getGross(): float
    {
        return $this->gross;
    }

    public function setGross(float $gross): self
    {
        $this->gross = $gross;
        return $this;
    }

    public function getNet(): float
    {
        return $this->net;
    }

    public function setNet(float $net): self
    {
        $this->net = $net;
        return $this;
    }

    public function getVatAmount(): float
    {
        return $this->vatAmount;
    }

    public function setVatAmount(float $vatAmount): self
    {
        $this->vatAmount = $vatAmount;
        return $this;
    }

    public function getVatRate(): float
    {
        return $this->vatRate;
    }

    public function setVatRate(float $vatRate): self
    {
        $this->vatRate = $vatRate;
        return $this;
    }
}
