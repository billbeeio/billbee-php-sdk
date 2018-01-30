<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2018 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\JOM\JsonField;

class TermsInfo
{
    /**
     * @var string
     * @JsonField(name="LinkToTermsWebPage", type="string")
     */
    public $termsWebPageLink = '';
    /**
     * @var string
     * @JsonField(name="LinkToPrivacyWebPage", type="string")
     */
    public $privacyWebPageLink = '';
    /**
     * @var string
     * @JsonField(name="LinkToTermsHtmlContent", type="string")
     */
    public $termsContentLink = '';
    /**
     * @var string
     * @JsonField(name="LinkToPrivacyHtmlContent", type="string")
     */
    public $privacyContentLink = '';
}
