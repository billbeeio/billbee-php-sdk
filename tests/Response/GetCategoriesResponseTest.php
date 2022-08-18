<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Category;
use BillbeeDe\BillbeeAPI\Response\GetCategoriesResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\CategoryTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetCategoriesResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetCategoriesResponse();
        self::assertSerialize('Response/get_categories_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_categories_response.json',
            GetCategoriesResponse::class,
            function (GetCategoriesResponse $result) {
                self::assertInstanceOf(Category::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetCategoriesResponse(): GetCategoriesResponse
    {
        return (new GetCategoriesResponse())
            ->setData([CategoryTest::getCategory()]);
    }
}
