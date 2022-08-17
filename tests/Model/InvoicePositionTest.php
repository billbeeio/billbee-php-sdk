<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\InvoicePosition;
use BillbeeDe\BillbeeAPI\Model\InvoicePositionAdditionalFee;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class InvoicePositionTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new InvoicePosition();
        $result
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
        ;
        self::assertSerialize('Model/invoice_position.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/invoice_position.json',
            InvoicePosition::class,
            function (InvoicePosition $result) {
                self::assertEquals(1, $result->getPosition());
                self::assertEquals(12, $result->getAmount());
                self::assertEquals(floatval("11.1176"), $result->getNetValue());
                self::assertEquals(133.4118, $result->getTotalNetValue());
                self::assertEquals(13.23, $result->getGrossValue());
                self::assertEquals(158.76, $result->getTotalGrossValue());
                self::assertEquals(19, $result->getVatRate());
                self::assertEquals(58592683, $result->getArticleId());
                self::assertEquals("TESTBESTAND", $result->getSku());
                self::assertEquals("Test Bestandsabgleich", $result->getTitle());
                self::assertEquals(100000317105650, $result->getId());
                self::assertEquals(25.3482, $result->getTotalVatAmount());
                self::assertEquals(2, $result->getRebatePercent());
            }
        );
    }
}
