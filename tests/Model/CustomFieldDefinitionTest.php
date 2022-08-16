<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition;
use BillbeeDe\BillbeeAPI\Model\CustomFieldDefinitionMetaData;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomFieldDefinitionTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new CustomFieldDefinition();
        $result
            ->setId(100000000002236)
            ->setName('Multi Dropdown')
            ->setConfiguration([
                'Choices' => ['Test1', 'Test2', 'Test3'],
                'Multiple' => true,
            ])
            ->setType(3)
            ->setIsNullable(true);
        self::assertSerialize('Model/custom_field_definition.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/custom_field_definition.json',
            CustomFieldDefinition::class,
            function (CustomFieldDefinition $result) {
                self::assertEquals(100000000002236, $result->getId());
                self::assertEquals("Multi Dropdown", $result->getName());
                self::assertEquals([
                    'Choices' => ['Test1', 'Test2', 'Test3'],
                    'Multiple' => true,
                ], $result->getConfiguration());
                self::assertEquals(3, $result->getType());
                self::assertEquals(true, $result->isNullable());
            }
        );
    }
}
