<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Payment;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class PaymentTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getPayment();
        self::assertSerialize('Model/payment.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/payment.json',
            Payment::class,
            function (Payment $result) {
                self::assertEquals(100000045032352, $result->getId());
                self::assertEquals("txid", $result->getTransactionId());
                self::assertEquals(new \DateTime("2022-08-17T00:00:00"), $result->getPayDate());
                self::assertEquals(1, $result->getPaymentMethod());
                self::assertEquals("foo", $result->getSourceTechnology());
                self::assertEquals("konto", $result->getSourceText());
                self::assertEquals(162.0, $result->getPayValue());
                self::assertEquals("bestellung", $result->getPurpose());
                self::assertEquals("max muster", $result->getName());
            }
        );
    }

    public static function getPayment(): Payment
    {
        return (new Payment())
            ->setId(100000045032352)
            ->setTransactionId("txid")
            ->setPayDate(new \DateTime("2022-08-17T00:00:00"))
            ->setPaymentMethod(1)
            ->setSourceTechnology("foo")
            ->setSourceText("konto")
            ->setPayValue(162.0)
            ->setPurpose("bestellung")
            ->setName("max muster");
    }
}
