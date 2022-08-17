<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\InvoiceDocument;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class InvoiceDocumentTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new InvoiceDocument();
        $result
            ->setOrderNumber("Test")
            ->setInvoiceNumber("RN-2022-0083")
            ->setPDFData("base64-data")
            ->setInvoiceDate(new \DateTime("2022-07-22T09:54:25.31"))
            ->setTotalGross(170.76)
            ->setTotalNet(143.5)
            ->setPdfDownloadUrl("https://objectstore.billbee.io");
        self::assertSerialize('Model/invoice_document.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/invoice_document.json',
            InvoiceDocument::class,
            function (InvoiceDocument $result) {
                self::assertEquals("Test", $result->getOrderNumber());
                self::assertEquals("RN-2022-0083", $result->getInvoiceNumber());
                self::assertEquals("base64-data", $result->getPDFData());
                self::assertEquals("2022-07-22T09:54:25+00:00", $result->getInvoiceDate()->format('c'));
                self::assertEquals(170.76, $result->getTotalGross());
                self::assertEquals(143.5, $result->getTotalNet());
                self::assertEquals("https://objectstore.billbee.io", $result->getPdfDownloadUrl());
            }
        );
    }
}
