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
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Text")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $text;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LanguageCode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $languageCode;

    public function __construct($text = '', $languageCode = '')
    {
        $this->setText($text);
        $this->setLanguageCode($languageCode);
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getLanguageCode(): ?string
    {
        return $this->languageCode;
    }

    public function setLanguageCode(?string $languageCode): self
    {
        $this->languageCode = $languageCode;
        return $this;
    }
}
