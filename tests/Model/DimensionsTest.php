<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Dimensions;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class DimensionsTest extends SerializerTestCase
{
    public static function getDimensions(): Dimensions
    {
        return (new Dimensions())
            ->setWidth(200.2)
            ->setHeight(50.5)
            ->setLength(240.3);
    }

    public function testSerialize(): void
    {
        $result = self::getDimensions();
        self::assertSerialize('Model/dimensions.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/dimensions.json',
            Dimensions::class,
            function (Dimensions $result) {
                self::assertEquals(200.2, $result->getWidth());
                self::assertEquals(50.5, $result->getHeight());
                self::assertEquals(240.3, $result->getLength());
            }
        );
    }
}
