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

use BillbeeDe\BillbeeAPI\Type\SendMode;
use MintWare\DMM\DataField;

class MessageForCustomer
{
    /**
     * @var int
     * @DataField(name="SendMode", type="int")
     *
     * @see SendMode
     */
    public $sendMode;

    /**
     * @var \BillbeeDe\BillbeeAPI\Model\TranslatableText[]
     * @DataField(name="Subject", type="BillbeeDe\BillbeeAPI\Model\TranslatableText[]")
     *
     * @see \BillbeeDe\BillbeeAPI\Model\TranslatableText;
     */
    public $subject;

    /**
     * @var \BillbeeDe\BillbeeAPI\Model\TranslatableText[]
     * @DataField(name="Body", type="BillbeeDe\BillbeeAPI\Model\TranslatableText[]")
     */
    public $body;

    /**
     * @var string
     * @DataField(name="AlternativeMail", type="string")
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
