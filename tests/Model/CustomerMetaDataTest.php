<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CustomerMetaData;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomerMetaDataTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new CustomerMetaData();
        $result
            ->setId(208297764)
            ->setTypeId(1)
            ->setTypeName("EMail")
            ->setSubType("")
            ->setValue("max@mustermann.tld");
        self::assertSerialize('Model/customer_meta_data.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/customer_meta_data.json',
            CustomerMetaData::class,
            function (CustomerMetaData $result) {
                self::assertEquals(208297764, $result->getId());
                self::assertEquals(1, $result->getTypeId());
                self::assertEquals("EMail", $result->getTypeName());
                self::assertEquals("", $result->getSubType());
                self::assertEquals("max@mustermann.tld", $result->getValue());
            }
        );
    }
}
