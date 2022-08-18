<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\PartnerOrder;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class PartnerOrderTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new PartnerOrder();
        $result
            ->setId(100000187723587)
            ->setExternalId("#19405145")
            ->setInvoiceNumber("12345")
            ->setInvoiceCreatedAt(new \DateTime("2022-08-17T02:00:00+00:00"))
            ->setInvoiceDate(new \DateTime("2022-08-17T02:00:00+00:00"))
            ->setCreatedAt(new \DateTime("2022-08-17T02:00:00+00:00"))
            ->setPaidAt(new \DateTime("2022-08-17T02:00:00+00:00"))
            ->setShippedAt(new \DateTime("2022-08-17T02:00:00+00:00"))
            ->setHasInvoice(true)
            ->setCanCreateAutoInvoice(true)
            ->setOrderStateId(1)
            ->setOrderStateText("Bestellt")
            ->setTotalGross(113.11)
            ->setShopName("Fake Shop 3");
        self::assertSerialize('Model/partner_order.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/partner_order.json',
            PartnerOrder::class,
            function (PartnerOrder $result) {
                self::assertEquals(100000187723587, $result->getId());
                self::assertEquals("#19405145", $result->getExternalId());
                self::assertEquals("12345", $result->getInvoiceNumber());
                self::assertEquals("2022-08-17T02:00:00+00:00", $result->getInvoiceCreatedAt()->format('c'));
                self::assertEquals("2022-08-17T02:00:00+00:00", $result->getInvoiceDate()->format('c'));
                self::assertEquals("2022-08-17T02:00:00+00:00", $result->getCreatedAt()->format('c'));
                self::assertEquals("2022-08-17T02:00:00+00:00", $result->getPaidAt()->format('c'));
                self::assertEquals("2022-08-17T02:00:00+00:00", $result->getShippedAt()->format('c'));
                self::assertEquals(true, $result->hasInvoice());
                self::assertEquals(true, $result->canCreateAutoInvoice());
                self::assertEquals(1, $result->getOrderStateId());
                self::assertEquals("Bestellt", $result->getOrderStateText());
                self::assertEquals(113.11, $result->getTotalGross());
                self::assertEquals("Fake Shop 3", $result->getShopName());
            }
        );
    }
}
