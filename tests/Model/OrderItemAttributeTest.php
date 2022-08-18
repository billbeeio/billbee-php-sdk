<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\OrderItemAttribute;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class OrderItemAttributeTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new OrderItemAttribute();
        $result
            ->setId("100000167774144")
            ->setName("x")
            ->setValue("y")
            ->setPrice(0.00);
        self::assertSerialize('Model/order_item_attribute.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/order_item_attribute.json',
            OrderItemAttribute::class,
            function (OrderItemAttribute $result) {
                self::assertEquals("100000167774144", $result->getId());
                self::assertEquals("x", $result->getName());
                self::assertEquals("y", $result->getValue());
                self::assertEquals(0.00, $result->getPrice());
            }
        );
    }
}
