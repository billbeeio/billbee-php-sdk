<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\OrderUser;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderUserTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new OrderUser();
        $result
            ->setPlatform("avocadostore")
            ->setShopName("test")
            ->setShopId(100000000092372)
            ->setId("1234")
            ->setNick("nick name")
            ->setFirstName("vorname")
            ->setLastName("nachname")
            ->setFullName("vorname nachname")
            ->setEmail("max@muster.tld")
           ;
        self::assertSerialize('Model/seller.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/seller.json',
            OrderUser::class,
            function (OrderUser $result) {
                self::assertEquals("avocadostore", $result->getPlatform());
                self::assertEquals("test", $result->getShopName());
                self::assertEquals(100000000092372, $result->getShopId());
                self::assertEquals("1234", $result->getId());
                self::assertEquals("nick name", $result->getNick());
                self::assertEquals("vorname", $result->getFirstName());
                self::assertEquals("nachname", $result->getLastName());
                self::assertEquals("vorname nachname", $result->getFullName());
                self::assertEquals("max@muster.tld", $result->getEmail());
            }
        );
    }
}
