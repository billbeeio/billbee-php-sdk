<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\Event;
use BillbeeDe\BillbeeAPI\Response\GetEventsResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\EventTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetEventsResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetEventsResponse();
        self::assertSerialize('Response/get_events_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_events_response.json',
            GetEventsResponse::class,
            function (GetEventsResponse $result) {
                self::assertInstanceOf(Event::class, $result->getData()[0]);
            }
        );
    }

    public static function getGetEventsResponse(): GetEventsResponse
    {
        return (new GetEventsResponse())
            ->setData([EventTest::getEvent()]);
    }
}
