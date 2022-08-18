<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Address;
use BillbeeDe\BillbeeAPI\Model\Comment;
use BillbeeDe\BillbeeAPI\Model\Order;
use BillbeeDe\BillbeeAPI\Model\OrderHistoryEntry;
use BillbeeDe\BillbeeAPI\Model\OrderItem;
use BillbeeDe\BillbeeAPI\Model\OrderItemAttribute;
use BillbeeDe\BillbeeAPI\Model\OrderUser;
use BillbeeDe\BillbeeAPI\Model\SoldProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getOrder();
        self::assertSerialize('Model/order.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/order.json',
            Order::class,
            function (Order $result) {
                self::assertEquals(15.18, $result->getRebateDifference());
                self::assertEquals([], $result->getShipments());
                self::assertEquals(false, $result->isAcceptLossOfReturnRight());
                self::assertEquals(100000186018330, $result->getId());
                self::assertEquals("Id", $result->getExternalId());
                self::assertEquals("Test", $result->getOrderNumber());
                self::assertEquals(1, $result->getState());
                self::assertEquals(0, $result->getVatMode());
                self::assertEquals("2022-07-22T00:00:00+00:00", $result->getCreatedAt()->format('c'));
                self::assertEquals("2022-08-17T00:00:00+00:00", $result->getShippedAt()->format('c'));
                self::assertEquals("2022-08-17T09:47:25+00:00", $result->getConfirmedAt()->format('c'));
                self::assertEquals("2022-08-10T00:00:00+00:00", $result->getPayedAt()->format('c'));
                self::assertEquals("Eigene Notizen zu der Bestellung", $result->getSellerComment());
                self::assertEquals("RN-2022-00", $result->getInvoiceNumberPrefix());
                self::assertEquals("-xx", $result->getInvoiceNumberPostfix());
                self::assertEquals(83, $result->getInvoiceNumber());
                self::assertEquals("2022-07-22T09:54:25+00:00", $result->getInvoiceDate()->format('c'));
                self::assertEquals(22, $result->getPaymentMethod());
                self::assertEquals(12, $result->getShippingCost());
                self::assertEquals(170.76, $result->getTotalCost());
                self::assertEquals(0, $result->getAdjustmentCost());
                self::assertEquals("test", $result->getAdjustmentReason());
                self::assertEquals("EUR", $result->getCurrency());
                self::assertEquals("2022-08-17T09:47:25+00:00", $result->getUpdatedAt()->format('c'));
                self::assertEquals(19, $result->getTaxRate1());
                self::assertEquals(7, $result->getTaxRate2());
                self::assertEquals(100000186018330, $result->getId());
                self::assertEquals(2, $result->getParentOrderId());
                self::assertEquals("1234", $result->getVatId());
                self::assertEquals(["test"], $result->getTags());
                self::assertEquals(6, $result->getShipWeightKg());
                self::assertEquals("DE", $result->getLanguageCode());
                self::assertEquals(162, $result->getPaidAmount());
                self::assertEquals(12345, $result->getShippingProfileId());
                self::assertEquals(100000000022240, $result->getShippingProviderId());
                self::assertEquals(100000000288647, $result->getShippingProviderProductId());
                self::assertEquals("DHL", $result->getShippingProviderName());
                self::assertEquals("DHL Paket", $result->getShippingProviderProductName());
                self::assertEquals("ShippingProfileName", $result->getShippingProfileName());
                self::assertEquals("remark", $result->getPaymentInstruction());
                self::assertEquals("IsCancelationFor", $result->getIsCancellationFor());
                self::assertEquals("txid", $result->getPaymentTransactionId());
                self::assertEquals("1234", $result->getDistributionCenter());
                self::assertEquals("AZ", $result->getDeliverySourceCountryCode());
                self::assertEquals("CustomInvoiceNote", $result->getCustomInvoiceNote());
                self::assertEquals("1", $result->getCustomerNumber());
                self::assertEquals("reference", $result->getPaymentReference());
                self::assertEquals(CustomerTest::getCustomer(), $result->getCustomer());
                self::assertEquals([PaymentTest::getPayment()], $result->getPayments());
                self::assertEquals("2022-08-17T09:47:25+00:00", $result->getLastModifiedAt()->format('c'));
                self::assertEquals(92372, $result->getApiAccountId());
                self::assertEquals("test", $result->getApiAccountName());
                self::assertEquals("1234", $result->getMerchantVatId());
                self::assertEquals("1234", $result->getCustomerVatId());
                self::assertCount(1, $result->getComments());
                self::assertInstanceOf(Comment::class, $result->getComments()[0]);
                self::assertInstanceOf(Address::class, $result->getInvoiceAddress());
                self::assertInstanceOf(Address::class, $result->getShippingAddress());
                self::assertCount(1, $result->getOrderItems());
                self::assertInstanceOf(OrderItem::class, $result->getOrderItems()[0]);
                self::assertInstanceOf(OrderUser::class, $result->getSeller());
                self::assertInstanceOf(OrderUser::class, $result->getBuyer());
                self::assertCount(1, $result->getHistoryEntries());
                self::assertInstanceOf(OrderHistoryEntry::class, $result->getHistoryEntries()[0]);
            }
        );
    }

    public static function getOrder(): Order
    {
        return (new Order())
            ->setRebateDifference(15.18)
            ->setShipments([])
            ->setAcceptLossOfReturnRight(false)
            ->setId(100000186018330)
            ->setExternalId("Id")
            ->setOrderNumber("Test")
            ->setState(1)
            ->setVatMode(0)
            ->setCreatedAt(new \DateTime("2022-07-22T00:00:00"))
            ->setShippedAt(new \DateTime("2022-08-17T00:00:00"))
            ->setConfirmedAt(new \DateTime("2022-08-17T09:47:25+00:00"))
            ->setPayedAt(new \DateTime("2022-08-10T00:00:00"))
            ->setSellerComment("Eigene Notizen zu der Bestellung")
            ->setInvoiceNumberPrefix("RN-2022-00")
            ->setInvoiceNumberPostfix("-xx")
            ->setInvoiceNumber(83)
            ->setInvoiceDate(new \DateTime("2022-07-22T09:54:25.31"))
            ->setPaymentMethod(22)
            ->setShippingCost(12)
            ->setTotalCost(170.76)
            ->setAdjustmentCost(0)
            ->setAdjustmentReason("test")
            ->setCurrency("EUR")
            ->setUpdatedAt(new \DateTime("2022-08-17T09:47:25+00:00"))
            ->setTaxRate1(19)
            ->setTaxRate2(7)
            ->setId(100000186018330)
            ->setParentOrderId(2)
            ->setVatId("1234")
            ->setTags(["test"])
            ->setShipWeightKg(6)
            ->setLanguageCode("DE")
            ->setPaidAmount(162)
            ->setShippingProfileId(12345)
            ->setShippingProviderId(100000000022240)
            ->setShippingProviderProductId(100000000288647)
            ->setShippingProviderName("DHL")
            ->setShippingProviderProductName("DHL Paket")
            ->setShippingProfileName("ShippingProfileName")
            ->setPaymentInstruction("remark")
            ->setIsCancellationFor("IsCancelationFor")
            ->setPaymentTransactionId("txid")
            ->setDistributionCenter("1234")
            ->setDeliverySourceCountryCode("AZ")
            ->setCustomInvoiceNote("CustomInvoiceNote")
            ->setCustomerNumber("1")
            ->setPaymentReference("reference")
            ->setCustomer(CustomerTest::getCustomer())
            ->setPayments([PaymentTest::getPayment()])
            ->setLastModifiedAt(new \DateTime("2022-08-17T09:47:25.03"))
            ->setApiAccountId(92372)
            ->setApiAccountName("test")
            ->setMerchantVatId("1234")
            ->setCustomerVatId("1234")
            ->setComments([
                (new Comment())
                    ->setId(1)
                    ->setFromCustomer(true)
                    ->setName("customer")
                    ->setText("test")
                    ->setCreated(new \DateTime("2022-08-16T09:05:01.787Z"))
            ])
            ->setInvoiceAddress(
                (new Address())
                    ->setId(1)
                    ->setFirstName("Vorname")
                    ->setLastName("Nachname")
                    ->setCompany("Firma")
                    ->setNameAddition("Zusatz")
                    ->setStreet("Str")
                    ->setHousenumber("hausnummer")
                    ->setZip("12345")
                    ->setCity("ort")
                    ->setState("staat")
                    ->setCountryISO2("DE")
                    ->setCountry("DE")
                    ->setEmail("admin@domain.tld")
                    ->setPhone("12345")
            )
            ->setShippingAddress(
                (new Address())
                    ->setId(1)
                    ->setFirstName("Vorname")
                    ->setLastName("Nachname")
                    ->setCompany("Firma")
                    ->setNameAddition("Zusatz")
                    ->setStreet("Str")
                    ->setHousenumber("hausnummer")
                    ->setZip("12345")
                    ->setCity("ort")
                    ->setState("staat")
                    ->setCountryISO2("DE")
                    ->setCountry("DE")
                    ->setEmail("admin@domain.tld")
                    ->setPhone("12345")
            )
            ->setOrderItems([
                (new OrderItem())
                    ->setBillbeeId(100000317105650)
                    ->setTransactionId("txid")
                    ->setQuantity(12.0)
                    ->setTotalPrice(158.76)
                    ->setTaxAmount(25.348235294117647)
                    ->setTaxIndex(1)
                    ->setDiscount(2.0)
                    ->setGetPriceFromArticleIfAny(true)
                    ->setIsCoupon(false)
                    ->setAdjustStock(true)
                    ->setUnrebatedTotalPrice(162.0)
                    ->setSerialNumber("ycwegf")
                    ->setInvoiceSku("TESTBESTAND")
                    ->setProduct(
                        (new SoldProduct())
                            ->setOldId("4321")
                            ->setId("1234")
                            ->setTitle("Test Bestandsabgleich")
                            ->setWeight(500)
                            ->setSKU("TESTBESTAND")
                            ->setSkuOrId("TESTBESTAND")
                            ->setIsDigital(true)
                            ->setEAN("testejcz")
                            ->setTaric("1234")
                            ->setCountryOfOrigin("AX")
                            ->setBillbeeId(100000058592683)
                    )
                    ->setAttributes([
                        (new OrderItemAttribute())
                            ->setId("100000167774144")
                            ->setName("x")
                            ->setValue("y")
                            ->setPrice(0.00)
                    ])
            ])
            ->setSeller(
                (new OrderUser())->setPlatform("avocadostore")
                    ->setShopName("test")
                    ->setShopId(100000000092372)
                    ->setId("1234")
                    ->setNick("nick name")
                    ->setFirstName("vorname")
                    ->setLastName("nachname")
                    ->setFullName("vorname nachname")
                    ->setEmail("max@muster.tld")
            )
            ->setBuyer(
                (new OrderUser())->setPlatform("avocadostore")
                    ->setShopName("test")
                    ->setShopId(100000000092372)
                    ->setId("1234")
                    ->setNick("nick name")
                    ->setFirstName("vorname")
                    ->setLastName("nachname")
                    ->setFullName("vorname nachname")
                    ->setEmail("max@muster.tld")
            )
            ->setHistoryEntries([
                OrderHistoryEntryTest::getOrderHistoryEntry()
            ]);
    }
}
