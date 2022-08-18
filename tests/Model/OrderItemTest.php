<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\OrderItem;
use BillbeeDe\BillbeeAPI\Model\OrderItemAttribute;
use BillbeeDe\BillbeeAPI\Model\SoldProduct;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderItemTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new OrderItem();
        $result
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
            ]);
        self::assertSerialize('Model/order_item.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/order_item.json',
            OrderItem::class,
            function (OrderItem $result) {
                self::assertEquals(100000317105650, $result->getBillbeeId());
                self::assertEquals("txid", $result->getTransactionId());
                self::assertEquals(12.0, $result->getQuantity());
                self::assertEquals(158.76, $result->getTotalPrice());
                self::assertEquals(25.348235294117647, $result->getTaxAmount());
                self::assertEquals(1, $result->getTaxIndex());
                self::assertEquals(2.0, $result->getDiscount());
                self::assertEquals(true, $result->shouldGetPriceFromArticleIfAny());
                self::assertEquals(false, $result->isCoupon());
                self::assertEquals(true, $result->shouldAdjustStock());
                self::assertEquals(162.0, $result->getUnrebatedTotalPrice());
                self::assertEquals("ycwegf", $result->getSerialNumber());
                self::assertEquals("TESTBESTAND", $result->getInvoiceSku());
                self::assertInstanceOf(SoldProduct::class, $result->getProduct());
                self::assertCount(1, $result->getAttributes());
                self::assertInstanceOf(OrderItemAttribute::class, $result->getAttributes()[0]);
            }
        );
    }
}
