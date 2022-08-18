<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition;
use BillbeeDe\BillbeeAPI\Response\GetCustomFieldDefinitionsResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomFieldDefinitionTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCustomFieldDefinitionsResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetCustomFieldDefinitionsResponse();
        self::assertSerialize('Response/get_custom_field_definitions_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_custom_field_definitions_response.json',
            GetCustomFieldDefinitionsResponse::class,
            function (GetCustomFieldDefinitionsResponse $result) {
                self::assertInstanceOf(CustomFieldDefinition::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetCustomFieldDefinitionsResponse(): GetCustomFieldDefinitionsResponse
    {
        return (new GetCustomFieldDefinitionsResponse())
            ->setData([CustomFieldDefinitionTest::getCustomFieldDefinition()]);
    }
}
