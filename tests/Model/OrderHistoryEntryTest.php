<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\OrderHistoryEntry;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderHistoryEntryTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getOrderHistoryEntry();
        self::assertSerialize('Model/order_history_entry.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/order_history_entry.json',
            OrderHistoryEntry::class,
            function (OrderHistoryEntry $result) {
                self::assertEquals("2022-07-22T09:54:00+00:00", $result->getCreated()->format('c'));
                self::assertEquals("Auftrag eingelesen", $result->getEventTypeName());
                self::assertEquals("Der Auftrag wurde eingelesen", $result->getText());
                self::assertEquals("max", $result->getEmployeeName());
                self::assertEquals(0, $result->getTypeId());
            }
        );
    }

    public static function getOrderHistoryEntry(): OrderHistoryEntry
    {
        return (new OrderHistoryEntry())
            ->setCreated(new \DateTime("2022-07-22T09:54:00+00:00"))
            ->setEventTypeName("Auftrag eingelesen")
            ->setText("Der Auftrag wurde eingelesen")
            ->setEmployeeName("max")
            ->setTypeId(0);
    }
}
