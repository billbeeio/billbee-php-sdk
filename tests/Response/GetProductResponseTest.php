<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Response\GetProductResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\ProductTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetProductResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetProductResponse();
        self::assertSerialize('Response/get_product_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_product_response.json',
            GetProductResponse::class,
            function (GetProductResponse $result) {
                self::assertInstanceOf(Product::class, $result->getData());
            }
        );
    }

    public static function getGetProductResponse(): GetProductResponse
    {
        return (new GetProductResponse())
            ->setData(ProductTest::getProduct());
    }
}
