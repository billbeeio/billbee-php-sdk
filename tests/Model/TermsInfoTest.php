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

use BillbeeDe\BillbeeAPI\Model\TermsInfo;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class TermsInfoTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = self::getTermsInfo();
        self::assertSerialize('Model/terms_info.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/terms_info.json',
            TermsInfo::class,
            function (TermsInfo $result) {
                self::assertEquals("LinkToTermsWebPage", $result->getTermsWebPageLink());
                self::assertEquals("LinkToPrivacyWebPage", $result->getPrivacyWebPageLink());
                self::assertEquals("LinkToTermsHtmlContent", $result->getTermsContentLink());
                self::assertEquals("LinkToPrivacyHtmlContent", $result->getPrivacyContentLink());
            }
        );
    }

    public static function getTermsInfo(): TermsInfo
    {
        return (new TermsInfo())
            ->setTermsWebPageLink("LinkToTermsWebPage")
            ->setPrivacyWebPageLink("LinkToPrivacyWebPage")
            ->setTermsContentLink("LinkToTermsHtmlContent")
            ->setPrivacyContentLink("LinkToPrivacyHtmlContent");
    }
}
