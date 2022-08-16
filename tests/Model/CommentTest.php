<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Comment;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CommentTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new Comment();
        $result
            ->setId(1)
            ->setFromCustomer(true)
            ->setName("customer")
            ->setText("test")
            ->setCreated(new \DateTime("2022-08-16T09:05:01.787Z"));
        self::assertSerialize('Model/comment.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/comment.json',
            Comment::class,
            function (Comment $result) {
                self::assertEquals(1, $result->getId());
                self::assertEquals(true, $result->isFromCustomer());
                self::assertEquals("customer", $result->getName());
                self::assertEquals("test", $result->getText());
                self::assertEquals("2022-08-16T09:05:01+00:00", $result->getCreated()->format('c'));
            }
        );
    }
}
