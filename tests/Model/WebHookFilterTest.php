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

use BillbeeDe\BillbeeAPI\Model\WebHookFilter;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class WebHookFilterTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getWebHookFilter();
        self::assertSerialize('Model/webhook_filter.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/webhook_filter.json',
            WebHookFilter::class,
            function (WebHookFilter $result) {
                self::assertEquals("Filter", $result->getName());
                self::assertEquals("A filter", $result->getDescription());
            }
        );
    }

    public static function getWebHookFilter(): WebHookFilter
    {
        return (new WebHookFilter())
            ->setName("Filter")
            ->setDescription("A filter");
    }
}
