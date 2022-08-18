<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\CustomerAddress;
use BillbeeDe\BillbeeAPI\Model\CustomerAddressMetaData;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CustomerAddressTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getCustomerAddress();
        self::assertSerialize('Model/customer_address.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/customer_address.json',
            CustomerAddress::class,
            function (CustomerAddress $result) {
                self::assertEquals(100000176934711, $result->getId());
                self::assertEquals(1, $result->getAddressType());
                self::assertEquals(100000150176895, $result->getCustomerId());
                self::assertEquals("firma", $result->getCompany());
                self::assertEquals("Vorname", $result->getFirstName());
                self::assertEquals("Nachname", $result->getLastName());
                self::assertEquals("Name 2", $result->getName2());
                self::assertEquals("Straße", $result->getStreet());
                self::assertEquals("Hausnummer", $result->getHousenumber());
                self::assertEquals("PLZ", $result->getZip());
                self::assertEquals("Ort", $result->getCity());
                self::assertEquals("Bundesland", $result->getState());
                self::assertEquals("DE", $result->getCountryCode());
                self::assertEquals("max@mustermann.tld", $result->getEmail());
                self::assertEquals("12345", $result->getPhone1());
                self::assertEquals("47896", $result->getPhone2());
                self::assertEquals("010234", $result->getFax());
                self::assertEquals("Zusatz", $result->getAddressAddition());
            }
        );
    }

    public static function getCustomerAddress(): CustomerAddress
    {
        return (new CustomerAddress())
            ->setId(100000176934711)
            ->setAddressType(1)
            ->setCustomerId(100000150176895)
            ->setCompany("firma")
            ->setFirstName("Vorname")
            ->setLastName("Nachname")
            ->setName2("Name 2")
            ->setStreet("Straße")
            ->setHousenumber("Hausnummer")
            ->setZip("PLZ")
            ->setCity("Ort")
            ->setState("Bundesland")
            ->setCountryCode("DE")
            ->setEmail("max@mustermann.tld")
            ->setPhone1("12345")
            ->setPhone2("47896")
            ->setFax("010234")
            ->setAddressAddition("Zusatz");
    }
}
