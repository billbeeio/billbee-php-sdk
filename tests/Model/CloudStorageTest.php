<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CloudStorage;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CloudStorageTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new CloudStorage();
        $result
            ->setId(1)
            ->setName("GDrive")
            ->setType("GoogleDriveStorage")
            ->setUsedAsPrinter(true);
        self::assertSerialize('Model/cloud_storage.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/cloud_storage.json',
            CloudStorage::class,
            function (CloudStorage $result) {
                self::assertEquals(1, $result->getId());
                self::assertEquals("GDrive", $result->getName());
                self::assertEquals("GoogleDriveStorage", $result->getType());
                self::assertEquals(true, $result->isUsedAsPrinter());
            }
        );
    }
}
