<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\CloudStorage;
use BillbeeDe\BillbeeAPI\Response\GetCloudStoragesResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CloudStorageTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCloudStoragesResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetCloudStoragesResponse();
        self::assertSerialize('Response/get_cloud_storages_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_cloud_storages_response.json',
            GetCloudStoragesResponse::class,
            function (GetCloudStoragesResponse $result) {
                self::assertInstanceOf(CloudStorage::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetCloudStoragesResponse(): GetCloudStoragesResponse
    {
        return (new GetCloudStoragesResponse())
            ->setData([CloudStorageTest::getCloudStorage()]);
    }
}
