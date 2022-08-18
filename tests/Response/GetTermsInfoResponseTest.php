<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Model\TermsInfo;
use BillbeeDe\BillbeeAPI\Response\GetTermsInfoResponse;
use BillbeeDe\Tests\BillbeeAPI\Model\TermsInfoTest;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class GetTermsInfoResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getGetTermsInfoResponse();
        self::assertSerialize('Response/get_terms_info_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/get_terms_info_response.json',
            GetTermsInfoResponse::class,
            function (GetTermsInfoResponse $result) {
                self::assertInstanceOf(TermsInfo::class, $result->getData());
            }
        );
    }

    public static function getGetTermsInfoResponse(): GetTermsInfoResponse
    {
        return (new GetTermsInfoResponse())
            ->setData(TermsInfoTest::getTermsInfo());
    }
}
