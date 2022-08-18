<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\InvoiceDocument;
use BillbeeDe\BillbeeAPI\Response\CreateInvoiceResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\InvoiceDocumentTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class CreateInvoiceResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getCreateInvoiceResponse();
        self::assertSerialize('Response/create_invoice_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/create_invoice_response.json',
            CreateInvoiceResponse::class,
            function (CreateInvoiceResponse $result) {
                self::assertInstanceOf(InvoiceDocument::class, $result->getData());
            }
        );
    }

    public static function getCreateInvoiceResponse(): CreateInvoiceResponse
    {
        return (new CreateInvoiceResponse())
            ->setData(InvoiceDocumentTest::getInvoiceDocument());
    }
}
