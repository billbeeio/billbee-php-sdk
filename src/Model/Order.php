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

use BillbeeDe\BillbeeAPI\Type\OrderState;
use BillbeeDe\BillbeeAPI\Type\PaymentType;
use JMS\Serializer\Annotation as Serializer;

class Order
{
    const VAT_MODE_DEFAULT = 0;
    const VAT_MODE_SMALL_BUSINESS = 1;
    const VAT_MODE_INTRA_COMMUNITY_DELIVERY = 2;
    const VAT_MODE_EXPORT_3RD_COUNTRY = 3;
    const VAT_MODE_DIFFERENTIAL_TAXATION = 4;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillBeeOrderId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillBeeParentOrderId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $parentOrderId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $externalId;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("AcceptLossOfReturnRight")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $acceptLossOfReturnRight;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderNumber;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("State")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $state = OrderState::ORDERED;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("VatMode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *             The default value will be null. Set it on your own.
     */
    public $vatMode = self::VAT_MODE_DEFAULT;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("CreatedAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $createdAt;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("ShippedAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippedAt;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("ConfirmedAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $confirmedAt;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("PayedAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $payedAt;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SellerComment")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sellerComment;

    /**
     * @var ?Comment[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Comment>")
     * @Serializer\SerializedName("Comments")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $comments;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumberPrefix")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceNumberPrefix;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumberPostfix")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceNumberPostfix;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("InvoiceNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceNumber;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("InvoiceDate")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceDate;

    /**
     * @var ?Address
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Address")
     * @Serializer\SerializedName("InvoiceAddress")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $invoiceAddress;

    /**
     * @var ?Address
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Address")
     * @Serializer\SerializedName("ShippingAddress")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippingAddress;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("PaymentMethod")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *             The Default will be PaymentType::OTHER.
     *
     * @see PaymentType
     */
    public $paymentMethod;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ShippingCost")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippingCost;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalCost")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $totalCost;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("AdjustmentCost")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $adjustmentCost;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AdjustmentReason")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $adjustmentReason;

    /**
     * @var ?OrderItem[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\OrderItem>")
     * @Serializer\SerializedName("OrderItems")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $orderItems;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Currency")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $currency;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsCanceled")
     * @Serializer\Exclude()
     *
     * @deprecated Will be removed in the next major version.
     */
    public $isCanceled = false;

    /**
     * @var mixed
     * @deprecated Will be removed in the next major version.
     */
    public $restfulPath;

    /**
     * @var ?OrderUser
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\OrderUser")
     * @Serializer\SerializedName("Seller")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $seller;

    /**
     * @var ?OrderUser
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\OrderUser")
     * @Serializer\SerializedName("Buyer")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $buyer;

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("UpdatedAt")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $updatedAt;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TaxRate1")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $taxRate1;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TaxRate2")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $taxRate2;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VatId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $vatId;

    /**
     * @var ?string[]
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Tags")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $tags;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ShipWeightKg")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shipWeightKg;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LanguageCode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $languageCode;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PaidAmount")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $paidAmount;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProfileId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     * @deprecated remove in 2.0.0. Use Shipping $shippingProviderId or $shippingProviderProductId instead
     */
    public $shippingProfileId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingProfileName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     * @deprecated remove in 2.0.0. Use Shipping $shippingProviderName or $shippingProviderProductName instead
     */
    public $shippingProfileName;

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
    public $shippingProviderProductId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingProviderName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippingProviderName;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ShippingProviderProductName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $shippingProviderProductName;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentInstruction")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $paymentInstruction;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("IsCancelationFor")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $isCancellationFor;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentTransactionId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $paymentTransactionId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DeliverySourceCountryCode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $deliverySourceCountryCode;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CustomInvoiceNote")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $customInvoiceNote;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CustomerNumber")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $customerNumber;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("DistributionCenter")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $distributionCenter;

    /**
     * @var ?Customer
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Customer")
     * @Serializer\SerializedName("Customer")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $customer;

    /**
     * @var ?Payment[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Payment>")
     * @Serializer\SerializedName("Payments")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $payments;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("RebateDifference")
     */
    private $rebateDifference;

    /**
     * @var ?Shipment[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\Shipment>")
     * @Serializer\SerializedName("ShippingIds")
     */
    private $shipments = [];

    /**
     * @var ?OrderHistoryEntry[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\OrderHistoryEntry>")
     * @Serializer\SerializedName("History")
     */
    private $historyEntries = [];

    /**
     * @var ?\DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("LastModifiedAt")
     */
    private $lastModifiedAt;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ApiAccountId")
     */
    private $apiAccountId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ApiAccountName")
     */
    private $apiAccountName;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("MerchantVatId")
     */
    private $merchantVatId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CustomerVatId")
     */
    private $customerVatId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PaymentReference")
     */
    private $paymentReference;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getParentOrderId(): ?int
    {
        return $this->parentOrderId;
    }

    public function setParentOrderId(?int $parentOrderId): self
    {
        $this->parentOrderId = $parentOrderId;
        return $this;
    }

    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;
        return $this;
    }

    public function isAcceptLossOfReturnRight(): bool
    {
        return $this->acceptLossOfReturnRight;
    }

    public function setAcceptLossOfReturnRight(bool $acceptLossOfReturnRight): self
    {
        $this->acceptLossOfReturnRight = $acceptLossOfReturnRight;
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

    public function getState(): int
    {
        return $this->state;
    }

    public function setState(int $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function getVatMode(): ?int
    {
        return $this->vatMode;
    }

    public function setVatMode(?int $vatMode): self
    {
        $this->vatMode = $vatMode;
        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getShippedAt(): ?\DateTime
    {
        return $this->shippedAt;
    }

    public function setShippedAt(?\DateTime $shippedAt): self
    {
        $this->shippedAt = $shippedAt;
        return $this;
    }

    public function getConfirmedAt(): ?\DateTime
    {
        return $this->confirmedAt;
    }

    public function setConfirmedAt(?\DateTime $confirmedAt): self
    {
        $this->confirmedAt = $confirmedAt;
        return $this;
    }

    public function getPayedAt(): ?\DateTime
    {
        return $this->payedAt;
    }

    public function setPayedAt(?\DateTime $payedAt): self
    {
        $this->payedAt = $payedAt;
        return $this;
    }

    public function getSellerComment(): ?string
    {
        return $this->sellerComment;
    }

    public function setSellerComment(?string $sellerComment): self
    {
        $this->sellerComment = $sellerComment;
        return $this;
    }

    /** @return ?Comment[] */
    public function getComments(): ?array
    {
        return $this->comments;
    }

    /** @param ?Comment[] $comments */
    public function setComments(?array $comments): self
    {
        $this->comments = $comments;
        return $this;
    }

    public function getInvoiceNumberPrefix(): ?string
    {
        return $this->invoiceNumberPrefix;
    }

    public function setInvoiceNumberPrefix(?string $invoiceNumberPrefix): self
    {
        $this->invoiceNumberPrefix = $invoiceNumberPrefix;
        return $this;
    }

    public function getInvoiceNumberPostfix(): ?string
    {
        return $this->invoiceNumberPostfix;
    }

    public function setInvoiceNumberPostfix(?string $invoiceNumberPostfix): self
    {
        $this->invoiceNumberPostfix = $invoiceNumberPostfix;
        return $this;
    }

    public function getInvoiceNumber(): ?int
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(?int $invoiceNumber): self
    {
        $this->invoiceNumber = $invoiceNumber;
        return $this;
    }

    public function getInvoiceDate(): ?\DateTime
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(?\DateTime $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;
        return $this;
    }

    public function getInvoiceAddress(): ?Address
    {
        return $this->invoiceAddress;
    }

    public function setInvoiceAddress(?Address $invoiceAddress): self
    {
        $this->invoiceAddress = $invoiceAddress;
        return $this;
    }

    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(?Address $shippingAddress): self
    {
        $this->shippingAddress = $shippingAddress;
        return $this;
    }

    public function getPaymentMethod(): int
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(int $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    public function getShippingCost(): float
    {
        return $this->shippingCost;
    }

    public function setShippingCost(float $shippingCost): self
    {
        $this->shippingCost = $shippingCost;
        return $this;
    }

    public function getTotalCost(): float
    {
        return $this->totalCost;
    }

    public function setTotalCost(float $totalCost): self
    {
        $this->totalCost = $totalCost;
        return $this;
    }

    public function getAdjustmentCost(): float
    {
        return $this->adjustmentCost;
    }

    public function setAdjustmentCost(float $adjustmentCost): self
    {
        $this->adjustmentCost = $adjustmentCost;
        return $this;
    }

    public function getAdjustmentReason(): ?string
    {
        return $this->adjustmentReason;
    }

    public function setAdjustmentReason(?string $adjustmentReason): self
    {
        $this->adjustmentReason = $adjustmentReason;
        return $this;
    }

    /** @return ?OrderItem[] */
    public function getOrderItems(): ?array
    {
        return $this->orderItems;
    }

    /** @param ?OrderItem[] $orderItems */
    public function setOrderItems(?array $orderItems): self
    {
        $this->orderItems = $orderItems;
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

    public function getSeller(): ?OrderUser
    {
        return $this->seller;
    }

    public function setSeller(?OrderUser $seller): self
    {
        $this->seller = $seller;
        return $this;
    }

    public function getBuyer(): ?OrderUser
    {
        return $this->buyer;
    }

    public function setBuyer(?OrderUser $buyer): self
    {
        $this->buyer = $buyer;
        return $this;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getTaxRate1(): ?float
    {
        return $this->taxRate1;
    }

    public function setTaxRate1(?float $taxRate1): self
    {
        $this->taxRate1 = $taxRate1;
        return $this;
    }

    public function getTaxRate2(): ?float
    {
        return $this->taxRate2;
    }

    public function setTaxRate2(?float $taxRate2): self
    {
        $this->taxRate2 = $taxRate2;
        return $this;
    }

    public function getVatId(): ?string
    {
        return $this->vatId;
    }

    public function setVatId(?string $vatId): self
    {
        $this->vatId = $vatId;
        return $this;
    }

    /** @return ?string[] */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /** @param ?string[] $tags */
    public function setTags(?array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function getShipWeightKg(): ?float
    {
        return $this->shipWeightKg;
    }

    public function setShipWeightKg(?float $shipWeightKg): self
    {
        $this->shipWeightKg = $shipWeightKg;
        return $this;
    }

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }

    public function getPaidAmount(): ?float
    {
        return $this->paidAmount;
    }

    public function setPaidAmount(?float $paidAmount): self
    {
        $this->paidAmount = $paidAmount;
        return $this;
    }

    public function getShippingProfileId(): ?int
    {
        return $this->shippingProfileId;
    }

    public function setShippingProfileId(?int $shippingProfileId): self
    {
        $this->shippingProfileId = $shippingProfileId;
        return $this;
    }

    public function getShippingProfileName(): ?string
    {
        return $this->shippingProfileName;
    }

    public function setShippingProfileName(?string $shippingProfileName): self
    {
        $this->shippingProfileName = $shippingProfileName;
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

    public function getShippingProviderProductId(): ?int
    {
        return $this->shippingProviderProductId;
    }

    public function setShippingProviderProductId(?int $shippingProviderProductId): self
    {
        $this->shippingProviderProductId = $shippingProviderProductId;
        return $this;
    }

    public function getShippingProviderName(): ?string
    {
        return $this->shippingProviderName;
    }

    public function setShippingProviderName(?string $shippingProviderName): self
    {
        $this->shippingProviderName = $shippingProviderName;
        return $this;
    }

    public function getShippingProviderProductName(): ?string
    {
        return $this->shippingProviderProductName;
    }

    public function setShippingProviderProductName(?string $shippingProviderProductName): self
    {
        $this->shippingProviderProductName = $shippingProviderProductName;
        return $this;
    }

    public function getPaymentInstruction(): ?string
    {
        return $this->paymentInstruction;
    }

    public function setPaymentInstruction(?string $paymentInstruction): self
    {
        $this->paymentInstruction = $paymentInstruction;
        return $this;
    }

    public function getIsCancellationFor(): ?string
    {
        return $this->isCancellationFor;
    }

    public function setIsCancellationFor(?string $isCancellationFor): self
    {
        $this->isCancellationFor = $isCancellationFor;
        return $this;
    }

    public function getPaymentTransactionId(): ?string
    {
        return $this->paymentTransactionId;
    }

    public function setPaymentTransactionId(?string $paymentTransactionId): self
    {
        $this->paymentTransactionId = $paymentTransactionId;
        return $this;
    }

    public function getDeliverySourceCountryCode(): ?string
    {
        return $this->deliverySourceCountryCode;
    }

    public function setDeliverySourceCountryCode(?string $deliverySourceCountryCode): self
    {
        $this->deliverySourceCountryCode = $deliverySourceCountryCode;
        return $this;
    }

    public function getCustomInvoiceNote(): ?string
    {
        return $this->customInvoiceNote;
    }

    public function setCustomInvoiceNote(?string $customInvoiceNote): self
    {
        $this->customInvoiceNote = $customInvoiceNote;
        return $this;
    }

    public function getCustomerNumber(): ?string
    {
        return $this->customerNumber;
    }

    public function setCustomerNumber(?string $customerNumber): self
    {
        $this->customerNumber = $customerNumber;
        return $this;
    }

    public function getDistributionCenter(): ?string
    {
        return $this->distributionCenter;
    }

    public function setDistributionCenter(?string $distributionCenter): self
    {
        $this->distributionCenter = $distributionCenter;
        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    /** @return ?Payment[] */
    public function getPayments(): ?array
    {
        return $this->payments;
    }

    /** @param ?Payment[] $payments */
    public function setPayments(?array $payments): self
    {
        $this->payments = $payments;
        return $this;
    }

    public function getRebateDifference(): float
    {
        return $this->rebateDifference;
    }

    public function setRebateDifference(float $rebateDifference): self
    {
        $this->rebateDifference = $rebateDifference;
        return $this;
    }

    /** @return ?Shipment[] */
    public function getShipments(): ?array
    {
        return $this->shipments;
    }

    /** @param ?Shipment[] $shipments */
    public function setShipments(?array $shipments): self
    {
        $this->shipments = $shipments;
        return $this;
    }

    /** @return ?OrderHistoryEntry[] */
    public function getHistoryEntries(): ?array
    {
        return $this->historyEntries;
    }

    /** @param ?OrderHistoryEntry[] $historyEntries */
    public function setHistoryEntries(?array $historyEntries): self
    {
        $this->historyEntries = $historyEntries;
        return $this;
    }

    public function getLastModifiedAt(): ?\DateTime
    {
        return $this->lastModifiedAt;
    }

    public function setLastModifiedAt(?\DateTime $lastModifiedAt): self
    {
        $this->lastModifiedAt = $lastModifiedAt;
        return $this;
    }

    public function getApiAccountId(): ?int
    {
        return $this->apiAccountId;
    }

    public function setApiAccountId(?int $apiAccountId): self
    {
        $this->apiAccountId = $apiAccountId;
        return $this;
    }

    public function getApiAccountName(): ?string
    {
        return $this->apiAccountName;
    }

    public function setApiAccountName(?string $apiAccountName): self
    {
        $this->apiAccountName = $apiAccountName;
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

    public function getPaymentReference(): ?string
    {
        return $this->paymentReference;
    }

    public function setPaymentReference(?string $paymentReference): self
    {
        $this->paymentReference = $paymentReference;
        return $this;
    }
}
