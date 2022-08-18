<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition;
use BillbeeDe\BillbeeAPI\Model\ProductCustomField;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ProductCustomFieldTest extends SerializerTestCase
{
    public function testSerializeMultiple(): void
    {
        $result = self::getProductCustomField();
        self::assertSerialize('Model/product_custom_field_multiple.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/product_custom_field_multiple.json',
            ProductCustomField::class,
            function (ProductCustomField $result) {
                self::assertEquals(100000000658609, $result->getId());
                self::assertEquals(100000000002236, $result->getDefinitionId());
                self::assertEquals(100000060427005, $result->getArticleId());
                self::assertEquals(["Test1", "Test3"], $result->getValue());
                self::assertInstanceOf(CustomFieldDefinition::class, $result->getDefinition());
            }
        );
    }

    public static function getProductCustomField(): ProductCustomField
    {
        return (new ProductCustomField())
            ->setId(100000000658609)
            ->setDefinitionId(100000000002236)
            ->setArticleId(100000060427005)
            ->setValue(["Test1", "Test3"])
            ->setDefinition(CustomFieldDefinitionTest::getCustomFieldDefinition());
    }
}
