<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\UpdateStockResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class UpdateStockResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getUpdateStockResponse();
        self::assertSerialize('Response/update_stock_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/update_stock_response.json',
            UpdateStockResponse::class,
            function (UpdateStockResponse $result) {
                self::assertEquals([
                    "SKU" => "asd",
                    "OldStock" => 0,
                    "CurrentStock" => 123,
                    "UnfulfilledAmount" => 0.0,
                    "Message" => "The qty was successfully updated from 0 to 123"
                ], $result->getData());
            }
        );
    }

    public static function getUpdateStockResponse(): UpdateStockResponse
    {
        return (new UpdateStockResponse())
            ->setData([
                "SKU" => "asd",
                "OldStock" => 0,
                "CurrentStock" => 123,
                "UnfulfilledAmount" => 0.0,
                "Message" => "The qty was successfully updated from 0 to 123"
            ]);
    }
}
