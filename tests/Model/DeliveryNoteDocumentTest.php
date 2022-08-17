<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\DeliveryNoteDocument;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class DeliveryNoteDocumentTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new DeliveryNoteDocument();
        $result
            ->setOrderNumber("Test")
            ->setDeliveryNoteNumber("20")
            ->setPDFData("base64-encrypted-pdf")
            ->setDeliveryNoteDate(new \DateTime("2022-08-16T14:47:00", new \DateTimeZone('Europe/Berlin')))
            ->setPdfDownloadUrl("https://objectstore.billbee.io");
        self::assertSerialize('Model/delivery_note_document.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/delivery_note_document.json',
            DeliveryNoteDocument::class,
            function (DeliveryNoteDocument $result) {
                self::assertEquals("Test", $result->getOrderNumber());
                self::assertEquals("20", $result->getDeliveryNoteNumber());
                self::assertEquals("base64-encrypted-pdf", $result->getPDFData());
                self::assertEquals("https://objectstore.billbee.io", $result->getPdfDownloadUrl());
                self::assertEquals("2022-08-16T14:47:00+00:00", $result->getDeliveryNoteDate()->format('c'));
            }
        );
    }
}
