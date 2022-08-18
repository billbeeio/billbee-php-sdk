<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\TranslatableText;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class TranslatableTextTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new TranslatableText();
        $result
            ->setText("Test")
            ->setLanguageCode("DE");
        self::assertSerialize('Model/translatable_text.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/translatable_text.json',
            TranslatableText::class,
            function (TranslatableText $result) {
                self::assertEquals("Test", $result->getText());
                self::assertEquals("DE", $result->getLanguageCode());
            }
        );
    }
}
