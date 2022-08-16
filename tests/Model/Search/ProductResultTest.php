<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model\Search;

use BillbeeDe\BillbeeAPI\Model\Search\ProductResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ProductResultTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new ProductResult();
        $result
            ->setId(100000060342904)
            ->setShortText('test')
            ->setSku('PROD1234')
            ->setTags('tag1,tag2');
        self::assertSerialize('Model/Search/product_result.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/Search/product_result.json',
            ProductResult::class,
            function (ProductResult $result) {
                self::assertEquals(100000060342904, $result->getId());
                self::assertEquals('test', $result->getShortText());
                self::assertEquals('PROD1234', $result->getSku());
                self::assertEquals('tag1,tag2', $result->getTags());
            }
        );
    }
}
