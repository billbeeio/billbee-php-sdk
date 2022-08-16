<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Customer;
use BillbeeDe\BillbeeAPI\Model\CustomerMetaData;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomerTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new Customer();
        $defaultMailAddress = new CustomerMetaData();
        $defaultMailAddress->setId(208297764)
            ->setTypeId(1)
            ->setTypeName('EMail')
            ->setSubType('')
            ->setValue('max@mustermann.tld');
        $defaultPhone1 = new CustomerMetaData();
        $defaultPhone1->setId(208297765)
            ->setTypeId(2)
            ->setTypeName('Phone')
            ->setSubType('')
            ->setValue('12345');
        $result
            ->setId(100000150176895)
            ->setName("Max")
            ->setEmail("max@mustermann.tld")
            ->setTel1("12345")
            ->setTel2("12345")
            ->setNumber(1)
            ->setPriceGroupId(1818)
            ->setLanguageId(3)
            ->setVatId('1234')
            ->setType(0)
            ->setDefaultMailAddress($defaultMailAddress)
            ->setDefaultCommercialMailAddress($defaultMailAddress)
            ->setDefaultStatusUpdatesMailAddress($defaultMailAddress)
            ->setDefaultPhone1($defaultPhone1)
            ->setDefaultPhone2($defaultPhone1)
            ->setDefaultFax($defaultPhone1)
            ->setMetaData([$defaultMailAddress, $defaultPhone1]);
        self::assertSerialize('Model/customer.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/customer.json',
            Customer::class,
            function (Customer $result) {
                self::assertEquals(100000150176895, $result->getId());
                self::assertEquals("Max", $result->getName());
                self::assertEquals("max@mustermann.tld", $result->getEmail());
                self::assertEquals("12345", $result->getTel1());
                self::assertEquals("12345", $result->getTel2());
                self::assertEquals(1, $result->getNumber());
                self::assertEquals(1818, $result->getPriceGroupId());
                self::assertEquals(3, $result->getLanguageId());
                self::assertEquals('1234', $result->getVatId());
                self::assertEquals(0, $result->getType());
                self::assertInstanceOf(CustomerMetaData::class, $result->getDefaultMailAddress());
                self::assertInstanceOf(CustomerMetaData::class, $result->getDefaultCommercialMailAddress());
                self::assertInstanceOf(CustomerMetaData::class, $result->getDefaultStatusUpdatesMailAddress());
                self::assertInstanceOf(CustomerMetaData::class, $result->getDefaultPhone1());
                self::assertInstanceOf(CustomerMetaData::class, $result->getDefaultPhone2());
                self::assertInstanceOf(CustomerMetaData::class, $result->getDefaultFax());
                self::assertCount(2, $result->getMetaData());
                self::assertInstanceOf(CustomerMetaData::class, $result->getMetaData()[0]);
            }
        );
    }
}
