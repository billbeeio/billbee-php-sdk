<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Invoice;
use BillbeeDe\BillbeeAPI\Response\GetInvoicesResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\InvoiceTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetInvoicesResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetInvoicesResponse();
        self::assertSerialize('Response/get_invoices_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_invoices_response.json',
            GetInvoicesResponse::class,
            function (GetInvoicesResponse $result) {
                self::assertInstanceOf(Invoice::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetInvoicesResponse(): GetInvoicesResponse
    {
        return (new GetInvoicesResponse())
            ->setData([InvoiceTest::getInvoice()]);
    }
}
