<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model\Search;

use BillbeeDe\BillbeeAPI\Model\Search\OrderResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderResultTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new OrderResult();
        $result
            ->setId(122989702)
            ->setExternalReference('test')
            ->setBuyerName('Max Mustermann')
            ->setInvoiceNumber('IN1234')
            ->setCustomerName('Max Mustermann2')
            ->setArticleTexts('4711');
        self::assertSerialize('Model/Search/order_result.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/Search/order_result.json',
            OrderResult::class,
            function (OrderResult $result) {
                self::assertEquals(122989702, $result->getId());
                self::assertEquals('test', $result->getExternalReference());
                self::assertEquals('Max Mustermann', $result->getBuyerName());
                self::assertEquals('IN1234', $result->getInvoiceNumber());
                self::assertEquals('Max Mustermann2', $result->getCustomerName());
                self::assertEquals('4711', $result->getArticleTexts());
            }
        );
    }
}
