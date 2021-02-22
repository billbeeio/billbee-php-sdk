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

namespace BillbeeDe\BillbeeAPI\Type;

class SendMode
{
    /**
     * No message will be send
     * @var int
     */
    const NONE = 0;

    /**
     * The message will be send via email to the customer email address
     * @var int
     */
    const EMAIL = 1;

    /**
     * The message will be send via the shop or marketplace api (if supported)
     * @var int
     */
    const API = 2;

    /**
     * The message will be send via email if the email address exists otherwise via the shop or marketplace api (if supported)
     * @var int
     */
    const EMAIL_THEN_API = 3;

    /**
     * The message will be send via email to the alternative email address
     * @var int
     */
    const EXTERNAL_EMAIL = 4;
}
