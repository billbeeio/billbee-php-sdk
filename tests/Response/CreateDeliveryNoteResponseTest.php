<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\DeliveryNoteDocument;
use BillbeeDe\BillbeeAPI\Response\CreateDeliveryNoteResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\DeliveryNoteDocumentTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CreateDeliveryNoteResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getCreateDeliveryNoteResponse();
        self::assertSerialize('Response/create_delivery_note_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/create_delivery_note_response.json',
            CreateDeliveryNoteResponse::class,
            function (CreateDeliveryNoteResponse $result) {
                self::assertInstanceOf(DeliveryNoteDocument::class, $result->getData());
            }
        );
    }

    public static function getCreateDeliveryNoteResponse(): CreateDeliveryNoteResponse
    {
        return (new CreateDeliveryNoteResponse())
            ->setData(DeliveryNoteDocumentTest::getDeliveryNoteDocument());
    }
}
