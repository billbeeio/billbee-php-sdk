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

use BillbeeDe\BillbeeAPI\Type\SendMode;
use JMS\Serializer\Annotation as Serializer;

class MessageForCustomer
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("SendMode")
     *
     * @see SendMode
     */
    public $sendMode;

    /**
     * @var \BillbeeDe\BillbeeAPI\Model\TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Subject")
     *
     * @see \BillbeeDe\BillbeeAPI\Model\TranslatableText;
     */
    public $subject;

    /**
     * @var \BillbeeDe\BillbeeAPI\Model\TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Body")
     */
    public $body;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AlternativeMail")
     */
    public $alternativeEmailAddress;

    public function __construct(
        array $subject = [],
        array $body = [],
        $sendMode = SendMode::EMAIL_THEN_API,
        $alternativeEmailAddress = null
    ) {
        $this->subject = $subject;
        $this->body = $body;
        $this->sendMode = $sendMode;
        $this->alternativeEmailAddress = $alternativeEmailAddress;
    }
}
