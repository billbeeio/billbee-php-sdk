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

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class TermsInfo
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LinkToTermsWebPage")
     */
    public $termsWebPageLink = '';
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LinkToPrivacyWebPage")
     */
    public $privacyWebPageLink = '';
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LinkToTermsHtmlContent")
     */
    public $termsContentLink = '';
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LinkToPrivacyHtmlContent")
     */
    public $privacyContentLink = '';
}
