<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Source;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class SourceTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getSource();
        self::assertSerialize('Model/source.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/source.json',
            Source::class,
            function (Source $result) {
                self::assertEquals(36174052, $result->getId());
                self::assertEquals("manual", $result->getSource());
                self::assertEquals("test", $result->getSourceId());
                self::assertEquals("test", $result->getApiAccountName());
                self::assertEquals(70815, $result->getApiAccountId());
                self::assertEquals(1.0, $result->getExportFactor());
                self::assertEquals(false, $result->getStockSyncInactive());
                self::assertEquals(2.0, $result->getStockSyncMin());
                self::assertEquals(3.0, $result->getStockSyncMax());
                self::assertEquals(1.0, $result->getUnitsPerItem());
            }
        );
    }

    public static function getSource(): Source
    {
        return (new Source())
            ->setId(36174052)
            ->setSource("manual")
            ->setSourceId("test")
            ->setApiAccountName("test")
            ->setApiAccountId(70815)
            ->setExportFactor(1.0)
            ->setStockSyncInactive(false)
            ->setStockSyncMin(2.0)
            ->setStockSyncMax(3.0)
            ->setUnitsPerItem(1.0);
    }
}
