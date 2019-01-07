<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class TranslatableText
{
    /** @DataField(name="Text", type="string") */
    public $text;

    /** @DataField(name="LanguageCode", type="string") */
    public $languageCode;

    public function __construct($text = '', $languageCode = '')
    {
        $this->text = $text;
        $this->languageCode = $languageCode;
    }
}
