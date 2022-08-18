<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Address;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class AddressTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new Address();
        $result
            ->setId(1)
            ->setFirstName("Vorname")
            ->setLastName("Nachname")
            ->setCompany("Firma")
            ->setNameAddition("Zusatz")
            ->setStreet("Str")
            ->setHousenumber("hausnummer")
            ->setZip("12345")
            ->setCity("ort")
            ->setState("staat")
            ->setCountryISO2("DE")
            ->setCountry("DE")
            ->setEmail("admin@domain.tld")
            ->setPhone("12345");
        self::assertSerialize('Model/address.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/address.json',
            Address::class,
            function (Address $result) {
                self::assertEquals(1, $result->getId());
                self::assertEquals("Vorname", $result->getFirstName());
                self::assertEquals("Nachname", $result->getLastName());
                self::assertEquals("Firma", $result->getCompany());
                self::assertEquals("Zusatz", $result->getNameAddition());
                self::assertEquals("Str", $result->getStreet());
                self::assertEquals("hausnummer", $result->getHousenumber());
                self::assertEquals("12345", $result->getZip());
                self::assertEquals("ort", $result->getCity());
                self::assertEquals("staat", $result->getState());
                self::assertEquals("DE", $result->getCountryISO2());
                self::assertEquals("DE", $result->getCountry());
                self::assertEquals("admin@domain.tld", $result->getEmail());
                self::assertEquals("12345", $result->getPhone());
            }
        );
    }
}
