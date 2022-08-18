<?php

namespace BillbeeDe\Tests\BillbeeAPI\Response;

use BillbeeDe\BillbeeAPI\Response\BaseResponse;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class BaseResponseTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getBaseResponse();
        self::assertSerialize('Response/base_response.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Response/base_response.json',
            BaseResponse::class,
            function (BaseResponse $result) {
                self::assertEquals(
                    ['Page' => 1, 'TotalPages' => 467, 'TotalRows' => 467, 'PageSize' => 1],
                    $result->getPaging()
                );
                self::assertEquals('ErrorMessage', $result->getErrorMessage());
                self::assertEquals(1, $result->getErrorCode());
                self::assertEquals([], $result->getData());
            }
        );
    }

    public static function getBaseResponse(): BaseResponse
    {
        return (new BaseResponse())
            ->setPaging(['Page' => 1, 'TotalPages' => 467, 'TotalRows' => 467, 'PageSize' => 1])
            ->setErrorMessage('ErrorMessage')
            ->setErrorCode(1)
            ->setData([]);
    }
}
