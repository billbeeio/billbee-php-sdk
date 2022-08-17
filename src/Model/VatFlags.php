<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class VatFlags
{
    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("ThirdPartyCountry")
     */
    private $thirdPartyCountry = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("SrcCountryIsEqualToDstCountry")
     */
    private $srcCountryIsEqualToDstCountry = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("CustomerHasVatId")
     */
    private $customerHasVatId = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("EuDeliveryThresholdExceeded")
     */
    private $euDeliveryThresholdExceeded = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("OssEnabled")
     */
    private $ossEnabled = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("SellerIsRegisteredInDstCountry")
     */
    private $sellerIsRegisteredInDstCountry = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("OrderDistributionCountryIsEmpty")
     */
    private $orderDistributionCountryIsEmpty = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("UserProfileCountryIsEmpty")
     */
    private $userProfileCountryIsEmpty = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("SetIglWhenVatIdIsAvailableEnabled")
     */
    private $setIglWhenVatIdIsAvailableEnabled = false;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("RatesFrom")
     */
    private $ratesFrom = "";

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("VatIdFrom")
     */
    private $vatIdFrom = "string";

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsDistanceSale")
     */
    private $isDistanceSale = false;

    public function isThirdPartyCountry(): bool
    {
        return $this->thirdPartyCountry;
    }

    public function setThirdPartyCountry(bool $thirdPartyCountry): self
    {
        $this->thirdPartyCountry = $thirdPartyCountry;
        return $this;
    }

    public function isSrcCountryIsEqualToDstCountry(): bool
    {
        return $this->srcCountryIsEqualToDstCountry;
    }

    public function setSrcCountryIsEqualToDstCountry(bool $srcCountryIsEqualToDstCountry): self
    {
        $this->srcCountryIsEqualToDstCountry = $srcCountryIsEqualToDstCountry;
        return $this;
    }

    public function isCustomerHasVatId(): bool
    {
        return $this->customerHasVatId;
    }

    public function setCustomerHasVatId(bool $customerHasVatId): self
    {
        $this->customerHasVatId = $customerHasVatId;
        return $this;
    }

    public function isEuDeliveryThresholdExceeded(): bool
    {
        return $this->euDeliveryThresholdExceeded;
    }

    public function setEuDeliveryThresholdExceeded(bool $euDeliveryThresholdExceeded): self
    {
        $this->euDeliveryThresholdExceeded = $euDeliveryThresholdExceeded;
        return $this;
    }

    public function isOssEnabled(): bool
    {
        return $this->ossEnabled;
    }

    public function setOssEnabled(bool $ossEnabled): self
    {
        $this->ossEnabled = $ossEnabled;
        return $this;
    }

    public function isSellerIsRegisteredInDstCountry(): bool
    {
        return $this->sellerIsRegisteredInDstCountry;
    }

    public function setSellerIsRegisteredInDstCountry(bool $sellerIsRegisteredInDstCountry): self
    {
        $this->sellerIsRegisteredInDstCountry = $sellerIsRegisteredInDstCountry;
        return $this;
    }

    public function isOrderDistributionCountryIsEmpty(): bool
    {
        return $this->orderDistributionCountryIsEmpty;
    }

    public function setOrderDistributionCountryIsEmpty(bool $orderDistributionCountryIsEmpty): self
    {
        $this->orderDistributionCountryIsEmpty = $orderDistributionCountryIsEmpty;
        return $this;
    }

    public function isUserProfileCountryIsEmpty(): bool
    {
        return $this->userProfileCountryIsEmpty;
    }

    public function setUserProfileCountryIsEmpty(bool $userProfileCountryIsEmpty): self
    {
        $this->userProfileCountryIsEmpty = $userProfileCountryIsEmpty;
        return $this;
    }

    public function isSetIglWhenVatIdIsAvailableEnabled(): bool
    {
        return $this->setIglWhenVatIdIsAvailableEnabled;
    }

    public function setSetIglWhenVatIdIsAvailableEnabled(bool $setIglWhenVatIdIsAvailableEnabled): self
    {
        $this->setIglWhenVatIdIsAvailableEnabled = $setIglWhenVatIdIsAvailableEnabled;
        return $this;
    }

    public function getRatesFrom(): string
    {
        return $this->ratesFrom;
    }

    public function setRatesFrom(string $ratesFrom): self
    {
        $this->ratesFrom = $ratesFrom;
        return $this;
    }

    public function getVatIdFrom(): string
    {
        return $this->vatIdFrom;
    }

    public function setVatIdFrom(string $vatIdFrom): self
    {
        $this->vatIdFrom = $vatIdFrom;
        return $this;
    }

    public function isDistanceSale(): bool
    {
        return $this->isDistanceSale;
    }

    public function setIsDistanceSale(bool $isDistanceSale): self
    {
        $this->isDistanceSale = $isDistanceSale;
        return $this;
    }
}
