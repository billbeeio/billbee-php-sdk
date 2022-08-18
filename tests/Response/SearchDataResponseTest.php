<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Search\CustomerResult;
use BillbeeDe\BillbeeAPI\Model\Search\OrderResult;
use BillbeeDe\BillbeeAPI\Model\Search\ProductResult;
use BillbeeDe\BillbeeAPI\Response\SearchDataResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\Search\CustomerResultTest;
use BillbeeDe\Tests\BillbeeAPI\Model\Search\OrderResultTest;
use BillbeeDe\Tests\BillbeeAPI\Model\Search\ProductResultTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class SearchDataResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getSearchDataResponse();
        self::assertSerialize('Response/search_data_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/search_data_response.json',
            SearchDataResponse::class,
            function (SearchDataResponse $result) {
                self::assertInstanceOf(ProductResult::class, $result->getProducts()[0]);
                self::assertInstanceOf(OrderResult::class, $result->getOrders()[0]);
                self::assertInstanceOf(CustomerResult::class, $result->getCustomers()[0]);
            }
        );
    }

    public static function getSearchDataResponse(): SearchDataResponse
    {
        return (new SearchDataResponse())
            ->setProducts([ProductResultTest::getProductResult()])
            ->setCustomers([CustomerResultTest::getCustomerResult()])
            ->setOrders([OrderResultTest::getOrderResult()]);
    }
}
