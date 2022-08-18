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
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LinkToTermsWebPage")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $termsWebPageLink;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LinkToPrivacyWebPage")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $privacyWebPageLink;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LinkToTermsHtmlContent")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $termsContentLink;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LinkToPrivacyHtmlContent")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $privacyContentLink;

    public function getTermsWebPageLink(): ?string
    {
        return $this->termsWebPageLink;
    }

    public function setTermsWebPageLink(?string $termsWebPageLink): self
    {
        $this->termsWebPageLink = $termsWebPageLink;
        return $this;
    }

    public function getPrivacyWebPageLink(): ?string
    {
        return $this->privacyWebPageLink;
    }

    public function setPrivacyWebPageLink(?string $privacyWebPageLink): self
    {
        $this->privacyWebPageLink = $privacyWebPageLink;
        return $this;
    }

    public function getTermsContentLink(): ?string
    {
        return $this->termsContentLink;
    }

    public function setTermsContentLink(?string $termsContentLink): self
    {
        $this->termsContentLink = $termsContentLink;
        return $this;
    }

    public function getPrivacyContentLink(): ?string
    {
        return $this->privacyContentLink;
    }

    public function setPrivacyContentLink(?string $privacyContentLink): self
    {
        $this->privacyContentLink = $privacyContentLink;
        return $this;
    }
}
