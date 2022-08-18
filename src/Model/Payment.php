<?php
/**
 * Created by Florian Kunz <florian@fkunz.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\PaymentType;
use JMS\Serializer\Annotation as Serializer;

class Payment
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TransactionId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $transactionId;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("PayDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $payDate;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("PaymentType")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *
     * @see PaymentType
     */
    public $paymentMethod;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SourceTechnology")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sourceTechnology;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SourceText")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sourceText;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PayValue")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $payValue;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Purpose")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $purpose;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    public function setTransactionId(?string $transactionId): self
    {
        $this->transactionId = $transactionId;
        return $this;
    }

    public function getPayDate(): \DateTime
    {
        return $this->payDate;
    }

    public function setPayDate(\DateTime $payDate): self
    {
        $this->payDate = $payDate;
        return $this;
    }

    public function getPaymentMethod(): ?int
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?int $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getSourceTechnology(): ?string
    {
        return $this->sourceTechnology;
    }

    public function setSourceTechnology(?string $sourceTechnology): self
    {
        $this->sourceTechnology = $sourceTechnology;
        return $this;
    }

    public function getSourceText(): ?string
    {
        return $this->sourceText;
    }

    public function setSourceText(?string $sourceText): self
    {
        $this->sourceText = $sourceText;
        return $this;
    }

    public function getPayValue(): float
    {
        return $this->payValue;
    }

    public function setPayValue(float $payValue): self
    {
        $this->payValue = $payValue;
        return $this;
    }

    public function getPurpose(): ?string
    {
        return $this->purpose;
    }

    public function setPurpose(?string $purpose): self
    {
        $this->purpose = $purpose;
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
}
