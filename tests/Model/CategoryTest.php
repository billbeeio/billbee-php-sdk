<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Category;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CategoryTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getCategory();
        self::assertSerialize('Model/category.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/category.json',
            Category::class,
            function (Category $result) {
                self::assertEquals("Schuhe", $result->getName());
                self::assertEquals(8733, $result->getId());
            }
        );
    }

    public static function getCategory(): Category
    {
        return (new Category())
            ->setName("Schuhe")
            ->setId(8733);
    }
}
