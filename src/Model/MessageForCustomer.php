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

use BillbeeDe\BillbeeAPI\Type\SendMode;
use JMS\Serializer\Annotation as Serializer;

class MessageForCustomer
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("SendMode")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *
     * @see SendMode
     */
    public $sendMode;

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Subject")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     *
     * @see \BillbeeDe\BillbeeAPI\Model\TranslatableText;
     */
    public $subject;

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Body")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $body;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AlternativeMail")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $alternativeEmailAddress;

    public function __construct(
        array $subject = [],
        array $body = [],
        $sendMode = SendMode::EMAIL_THEN_API,
        $alternativeEmailAddress = null
    ) {
        $this
            ->setSubject($subject)
            ->setBody($body)
            ->setSendMode($sendMode)
            ->setAlternativeMailAddress($alternativeEmailAddress);
    }

    public function getSendMode()
    {
        return $this->sendMode;
    }

    public function setSendMode($sendMode)
    {
        $this->sendMode = $sendMode;
        return $this;
    }

    public function getSubject(): array
    {
        return $this->subject;
    }

    public function setSubject(array $subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    public function setBody(array $body): self
    {
        $this->body = $body;
        return $this;
    }

    public function getAlternativeMailAddress(): ?string
    {
        return $this->alternativeEmailAddress;
    }

    public function setAlternativeMailAddress(?string $alternativeEmailAddress): self
    {
        $this->alternativeEmailAddress = $alternativeEmailAddress;
        return $this;
    }
}
