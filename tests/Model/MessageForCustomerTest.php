<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\MessageForCustomer;
use BillbeeDe\BillbeeAPI\Model\TranslatableText;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class MessageForCustomerTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new MessageForCustomer();
        $result
            ->setSendMode(1)
            ->setSubject([new TranslatableText("Hallo", "DE")])
            ->setBody([new TranslatableText("Welt", "DE")])
            ->setAlternativeMailAddress("foo@bar.tld");
        self::assertSerialize('Model/message_for_customer.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/message_for_customer.json',
            MessageForCustomer::class,
            function (MessageForCustomer $result) {
                self::assertEquals(1, $result->getSendMode());
                self::assertEquals("foo@bar.tld", $result->getAlternativeMailAddress());
                self::assertCount(1, $result->getSubject());
                self::assertInstanceOf(TranslatableText::class, $result->getSubject()[0]);
                self::assertCount(1, $result->getBody());
                self::assertInstanceOf(TranslatableText::class, $result->getBody()[0]);
            }
        );
    }
}
