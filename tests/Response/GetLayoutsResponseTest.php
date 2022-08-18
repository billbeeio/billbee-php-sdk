<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Layout;
use BillbeeDe\BillbeeAPI\Response\GetLayoutsResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\LayoutTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetLayoutsResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetLayoutsResponse();
        self::assertSerialize('Response/get_layouts_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_layouts_response.json',
            GetLayoutsResponse::class,
            function (GetLayoutsResponse $result) {
                self::assertInstanceOf(Layout::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetLayoutsResponse(): GetLayoutsResponse
    {
        return (new GetLayoutsResponse())
            ->setData([LayoutTest::getLayout()]);
    }
}
