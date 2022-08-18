<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\VatFlags;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class VatFlagsTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new VatFlags();
        $result
            ->setThirdPartyCountry(false)
            ->setSrcCountryIsEqualToDstCountry(true)
            ->setCustomerHasVatId(false)
            ->setEuDeliveryThresholdExceeded(true)
            ->setOssEnabled(true)
            ->setSellerIsRegisteredInDstCountry(false)
            ->setOrderDistributionCountryIsEmpty(true)
            ->setUserProfileCountryIsEmpty(false)
            ->setSetIglWhenVatIdIsAvailableEnabled(true)
            ->setRatesFrom("destination_country")
            ->setVatIdFrom("destination_country")
            ->setIsDistanceSale(false);
        self::assertSerialize('Model/vat_flags.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/vat_flags.json',
            VatFlags::class,
            function (VatFlags $result) {
                self::assertEquals(false, $result->isThirdPartyCountry());
                self::assertEquals(true, $result->isSrcCountryIsEqualToDstCountry());
                self::assertEquals(false, $result->isCustomerHasVatId());
                self::assertEquals(true, $result->isEuDeliveryThresholdExceeded());
                self::assertEquals(true, $result->isOssEnabled());
                self::assertEquals(false, $result->isSellerIsRegisteredInDstCountry());
                self::assertEquals(true, $result->isOrderDistributionCountryIsEmpty());
                self::assertEquals(false, $result->isUserProfileCountryIsEmpty());
                self::assertEquals(true, $result->isSetIglWhenVatIdIsAvailableEnabled());
                self::assertEquals("destination_country", $result->getRatesFrom());
                self::assertEquals("destination_country", $result->getVatIdFrom());
                self::assertEquals(false, $result->isDistanceSale());
            }
        );
    }
}
