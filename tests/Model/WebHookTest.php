<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\WebHook;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class WebHookTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getWebHook();
        self::assertSerialize('Model/webhook.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/webhook.json',
            WebHook::class,
            function (WebHook $result) {
                self::assertEquals("Secret", $result->getSecret());
                self::assertEquals(["filter"], $result->getFilters());
                self::assertEquals(["a" => "b"], $result->getHeaders());
                self::assertEquals(["c" => "d"], $result->getProperties());
                self::assertEquals("Id", $result->getId());
                self::assertEquals("https://foo.bar", $result->getWebHookUri());
                self::assertEquals("a description", $result->getDescription());
                self::assertEquals(true, $result->isPaused());
            }
        );
    }

    public static function getWebHook(): WebHook
    {
        return (new WebHook())
            ->setSecret("Secret")
            ->setFilters(["filter"])
            ->setHeaders(["a" => "b"])
            ->setProperties(["c" => "d"])
            ->setId("Id")
            ->setWebHookUri("https://foo.bar")
            ->setDescription("a description")
            ->setIsPaused(true);
    }
}
