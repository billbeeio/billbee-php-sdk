<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\JOM\JsonField;

class TranslatableText
{
    /** @JsonField(name="Text", type="string") */
    public $text = '';

    /** @JsonField(name="LanguageCode", type="string") */
    public $languageCode = '';
}
