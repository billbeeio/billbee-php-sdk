<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Response\GetProductsResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\ProductTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetProductsResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetProductsResponse();
        self::assertSerialize('Response/get_products_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_products_response.json',
            GetProductsResponse::class,
            function (GetProductsResponse $result) {
                self::assertInstanceOf(Product::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetProductsResponse(): GetProductsResponse
    {
        return (new GetProductsResponse())
            ->setData([ProductTest::getProduct()]);
    }
}
