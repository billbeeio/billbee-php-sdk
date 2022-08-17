<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Event;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class EventTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new Event();
        $result
            ->setCreated(new \DateTime("2022-07-16T09:56:01.903"))
            ->setTypeId(55)
            ->setTypeText("Nutzung der API")
            ->setId(100002922949129)
            ->setEmployeeId("employee-id")
            ->setEmployeeName("max muster")
            ->setOrderId(123);
        self::assertSerialize('Model/event.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/event.json',
            Event::class,
            function (Event $result) {
                self::assertEquals("2022-07-16T09:56:01+00:00", $result->getCreated()->format('c'));
                self::assertEquals(55, $result->getTypeId());
                self::assertEquals("Nutzung der API", $result->getTypeText());
                self::assertEquals(100002922949129, $result->getId());
                self::assertEquals("employee-id", $result->getEmployeeId());
                self::assertEquals("max muster", $result->getEmployeeName());
                self::assertEquals(123, $result->getOrderId());
            }
        );
    }
}
