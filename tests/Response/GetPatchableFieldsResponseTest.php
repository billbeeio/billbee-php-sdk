<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\GetPatchableFieldsResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetPatchableFieldsResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetPatchableFieldsResponse();
        self::assertSerialize('Response/get_patchable_fields_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_patchable_fields_response.json',
            GetPatchableFieldsResponse::class,
            function (GetPatchableFieldsResponse $result) {
                self::assertEquals(["field1", "field2"], $result->getData());
            }
        );
    }

    public static function getGetPatchableFieldsResponse(): GetPatchableFieldsResponse
    {
        return (new GetPatchableFieldsResponse())
            ->setData(["field1", "field2"]);
    }
}
