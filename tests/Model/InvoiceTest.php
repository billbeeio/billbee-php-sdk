<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Invoice;
use BillbeeDe\BillbeeAPI\Model\InvoiceAdditionalFee;
use BillbeeDe\BillbeeAPI\Model\InvoicePosition;
use BillbeeDe\BillbeeAPI\Model\VatFlags;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class InvoiceTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new Invoice();
        $result
            ->setInvoiceNumber("RN-2022-0083")
            ->setType("invoice")
            ->setTitle("")
            ->setSalutation("Sir")
            ->setLastName("Max")
            ->setFirstName("Muster")
            ->setCompany("Firma")
            ->setCustomerNumber(1)
            ->setDebtorNumber(1)
            ->setInvoiceDate(new \DateTime("2022-07-22T09:54:25.31"))
            ->setTotalNet(133.41)
            ->setCurrency("EUR")
            ->setTotalGross(158.76)
            ->setPaymentTypeId(22)
            ->setOrderNumber("Test")
            ->setTransactionId("txid")
            ->setEmail("max@mustermann.tld")
            ->setShopName("test")
            ->setPayDate(new \DateTime("2022-08-10T00:00:00"))
            ->setVatMode(0)
            ->setId(100000186018330)
            ->setShippingCountry("DE")
            ->setMerchantVatId("1234")
            ->setCustomerVatId("1234")
            ->setAdditionalFees([
                (new InvoiceAdditionalFee())
                    ->setType("ShipCost")
                    ->setGross(11.996)
                    ->setNet(10.08)
                    ->setVatAmount(1.916)
                    ->setVatRate(19)
            ])
            ->setPositions([
                (new InvoicePosition())
                    ->setPosition(1)
                    ->setAmount(12)
                    ->setNetValue(11.1176)
                    ->setTotalNetValue(133.4118)
                    ->setGrossValue(13.23)
                    ->setTotalGrossValue(158.76)
                    ->setVatRate(19)
                    ->setArticleId(58592683)
                    ->setSku("TESTBESTAND")
                    ->setTitle("Test Bestandsabgleich")
                    ->setId(100000317105650)
                    ->setTotalVatAmount(25.3482)
                    ->setRebatePercent(2)
            ])
            ->setVatFlags(
                (new VatFlags())
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
                    ->setIsDistanceSale(false)
            );
        self::assertSerialize('Model/invoice.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/invoice.json',
            Invoice::class,
            function (Invoice $result) {
                self::assertEquals("RN-2022-0083", $result->getInvoiceNumber());
                self::assertEquals("invoice", $result->getType());
                self::assertEquals("", $result->getTitle());
                self::assertEquals("Sir", $result->getSalutation());
                self::assertEquals("Max", $result->getLastName());
                self::assertEquals("Muster", $result->getFirstName());
                self::assertEquals("Firma", $result->getCompany());
                self::assertEquals(1, $result->getCustomerNumber());
                self::assertEquals(1, $result->getDebtorNumber());
                self::assertEquals("2022-07-22T09:54:25+00:00", $result->getInvoiceDate()->format('c'));
                self::assertEquals(133.41, $result->getTotalNet());
                self::assertEquals("EUR", $result->getCurrency());
                self::assertEquals(158.76, $result->getTotalGross());
                self::assertEquals(22, $result->getPaymentTypeId());
                self::assertEquals("Test", $result->getOrderNumber());
                self::assertEquals("txid", $result->getTransactionId());
                self::assertEquals("max@mustermann.tld", $result->getEmail());
                self::assertEquals("test", $result->getShopName());
                self::assertEquals("2022-08-10T00:00:00+00:00", $result->getPayDate()->format('c'));
                self::assertEquals(0, $result->getVatMode());
                self::assertEquals(100000186018330, $result->getId());
                self::assertEquals("DE", $result->getShippingCountry());
                self::assertEquals("1234", $result->getMerchantVatId());
                self::assertEquals("1234", $result->getCustomerVatId());
                self::assertCount(1, $result->getAdditionalFees());
                self::assertInstanceOf(InvoiceAdditionalFee::class, $result->getAdditionalFees()[0]);
                self::assertInstanceOf(VatFlags::class, $result->getVatFlags());
                self::assertCount(1, $result->getPositions());
                self::assertInstanceOf(InvoicePosition::class, $result->getPositions()[0]);
            }
        );
    }
}
