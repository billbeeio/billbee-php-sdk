<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class TermsInfo
{
    /**
     * @var string
     * @DataField(name="LinkToTermsWebPage", type="string")
     */
    public $termsWebPageLink = '';
    /**
     * @var string
     * @DataField(name="LinkToPrivacyWebPage", type="string")
     */
    public $privacyWebPageLink = '';
    /**
     * @var string
     * @DataField(name="LinkToTermsHtmlContent", type="string")
     */
    public $termsContentLink = '';
    /**
     * @var string
     * @DataField(name="LinkToPrivacyHtmlContent", type="string")
     */
    public $privacyContentLink = '';
}
