<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition;
use BillbeeDe\BillbeeAPI\Response\GetCustomFieldDefinitionResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CustomFieldDefinitionTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCustomFieldDefinitionResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetCustomFieldDefinitionResponse();
        self::assertSerialize('Response/get_custom_field_definition_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_customer_response.json',
            GetCustomFieldDefinitionResponse::class,
            function (GetCustomFieldDefinitionResponse $result) {
                self::assertInstanceOf(CustomFieldDefinition::class, $result->getData());
            }
        );
    }

    public static function getGetCustomFieldDefinitionResponse(): GetCustomFieldDefinitionResponse
    {
        return (new GetCustomFieldDefinitionResponse())
            ->setData(CustomFieldDefinitionTest::getCustomFieldDefinition());
    }
}
