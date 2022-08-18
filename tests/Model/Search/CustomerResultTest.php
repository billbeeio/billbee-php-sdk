<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model\Search;

use BillbeeDe\BillbeeAPI\Model\Search\CustomerResult;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomerResultTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getCustomerResult();
        self::assertSerialize('Model/Search/customer_result.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/Search/customer_result.json',
            CustomerResult::class,
            function (CustomerResult $result) {
                self::assertEquals(1, $result->getId());
                self::assertEquals('Max', $result->getName());
                self::assertEquals('Test', $result->getAddresses());
                self::assertEquals('1234', $result->getNumber());
            }
        );
    }

    public static function getCustomerResult(): CustomerResult
    {
        return (new CustomerResult())
            ->setId(1)
            ->setName('Max')
            ->setAddresses('Test')
            ->setNumber('1234');
    }
}
