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

use BillbeeDe\BillbeeAPI\Type\InvoiceType;
use JMS\Serializer\Annotation as Serializer;

class Invoice
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
     * @Serializer\SerializedName("InvoiceNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceNumber = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Type")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *
     * @see InvoiceType
     */
    public $type = InvoiceType::INVOICE;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LastName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $lastName = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FirstName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $firstName = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Company")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $company = null;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("CustomerNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $customerNumber;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("DebtorNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $debtorNumber;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.v', 'UTC'>")
     * @Serializer\SerializedName("InvoiceDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceDate;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalNet")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $totalNet = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalGross")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $totalGross = 0.00;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Currency")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $currency = 'EUR';

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("PaymentTypeId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $paymentTypeId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderNumber = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TransactionId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $transactionId = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Email")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $email = '';

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShopName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shopName = null;

    /**
     * @var ?InvoicePosition[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\InvoicePosition>")
     * @Serializer\SerializedName("Positions")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $positions = [];

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime<'Y-m-d\TH:i:s.v', 'UTC'>")
     * @Serializer\SerializedName("PayDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $payDate = null;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("VatMode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $vatMode = Product::VAT_INDEX_NORMAL;

    /**
     * @var VatFlags
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\VatFlags")
     * @Serializer\SerializedName("VatFlags")
     */
    private $vatFlags = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingCountry")
     */
    private $shippingCountry = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Title")
     */
    private $title = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Salutation")
     */
    private $salutation = null;

    /**
     * @var ?InvoiceAdditionalFee[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\InvoiceAdditionalFee>")
     * @Serializer\SerializedName("AdditionalFees")
     */
    private $additionalFees = [];

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MerchantVatId")
     */
    private $merchantVatId = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CustomerVatId")
     */
    private $customerVatId = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getInvoiceNumber(): ?string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(?string $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;
        return $this;
    }

    public function getCustomerNumber(): int
    {
        return $this->customerNumber;
    }

    public function setCustomerNumber(int $customerNumber): self
    {
        $this->customerNumber = $customerNumber;
        return $this;
    }

    public function getDebtorNumber(): int
    {
        return $this->debtorNumber;
    }

    public function setDebtorNumber(int $debtorNumber): self
    {
        $this->debtorNumber = $debtorNumber;
        return $this;
    }

    public function getInvoiceDate(): \DateTime
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(\DateTime $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    public function getTotalNet(): float
    {
        return $this->totalNet;
    }

    public function setTotalNet(float $totalNet): self
    {
        $this->totalNet = $totalNet;
        return $this;
    }

    public function getTotalGross(): float
    {
        return $this->totalGross;
    }

    public function setTotalGross(float $totalGross): self
    {
        $this->totalGross = $totalGross;
        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): self
    {
        $this->currency = $currency;
        return $this;
    }

    public function getPaymentTypeId(): ?int
    {
        return $this->paymentTypeId;
    }

    public function setPaymentTypeId(?int $paymentTypeId): self
    {
        $this->paymentTypeId = $paymentTypeId;
        return $this;
    }

    public function getOrderNumber(): ?string
    {
        return $this->orderNumber;
    }

    public function setOrderNumber(?string $orderNumber): self
    {
        $this->orderNumber = $orderNumber;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getShopName(): ?string
    {
        return $this->shopName;
    }

    public function setShopName(?string $shopName): self
    {
        $this->shopName = $shopName;
        return $this;
    }

    /** @return ?InvoicePosition[] */
    public function getPositions(): ?array
    {
        return $this->positions;
    }

    /** @param ?InvoicePosition[] $positions */
    public function setPositions(?array $positions): self
    {
        $this->positions = $positions;
        return $this;
    }

    public function getPayDate(): ?\DateTime
    {
        return $this->payDate;
    }

    public function setPayDate(?\DateTime $payDate): self
    {
        $this->payDate = $payDate;
        return $this;
    }

    public function getVatMode(): int
    {
        return $this->vatMode;
    }

    public function setVatMode(int $vatMode): self
    {
        $this->vatMode = $vatMode;
        return $this;
    }

    public function getVatFlags(): ?VatFlags
    {
        return $this->vatFlags;
    }

    public function setVatFlags(?VatFlags $vatFlags): self
    {
        $this->vatFlags = $vatFlags;
        return $this;
    }

    public function getShippingCountry(): ?string
    {
        return $this->shippingCountry;
    }

    public function setShippingCountry(?string $shippingCountry): self
    {
        $this->shippingCountry = $shippingCountry;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getSalutation(): ?string
    {
        return $this->salutation;
    }

    public function setSalutation(?string $salutation): self
    {
        $this->salutation = $salutation;
        return $this;
    }

    /** @return ?InvoiceAdditionalFee[] */
    public function getAdditionalFees(): ?array
    {
        return $this->additionalFees;
    }

    /** @param ?InvoiceAdditionalFee[] $additionalFees */
    public function setAdditionalFees(?array $additionalFees): self
    {
        $this->additionalFees = $additionalFees;
        return $this;
    }

    public function getMerchantVatId(): ?string
    {
        return $this->merchantVatId;
    }

    public function setMerchantVatId(?string $merchantVatId): self
    {
        $this->merchantVatId = $merchantVatId;
        return $this;
    }

    public function getCustomerVatId(): ?string
    {
        return $this->customerVatId;
    }

    public function setCustomerVatId(?string $customerVatId): self
    {
        $this->customerVatId = $customerVatId;
        return $this;
    }
}
