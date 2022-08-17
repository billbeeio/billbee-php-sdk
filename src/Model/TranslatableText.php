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

class TranslatableText
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Text")
     */
    public $text;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LanguageCode")
     */
    public $languageCode;

    public function __construct($text = '', $languageCode = '')
    {
        $this->text = $text;
        $this->languageCode = $languageCode;
    }
}
