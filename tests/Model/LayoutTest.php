<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Layout;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class LayoutTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new Layout();
        $result
            ->setId(100000000132970)
            ->setName("Lieferschein")
            ->setType(2);
        self::assertSerialize('Model/layout.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/layout.json',
            Layout::class,
            function (Layout $result) {
                self::assertEquals(100000000132970, $result->getId());
                self::assertEquals("Lieferschein", $result->getName());
                self::assertEquals(2, $result->getType());
            }
        );
    }
}
