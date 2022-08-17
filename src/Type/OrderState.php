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

namespace BillbeeDe\BillbeeAPI\Type;

class OrderState
{
    const ORDERED = 1;
    const CONFIRMED = 2;
    const PAID = 3;
    const SHIPPED = 4;
    const RECLAMATION = 5;
    const DELETED = 6;
    const CLOSED = 7;
    const CANCELED = 8;
    const ARCHIVED = 9;
    # CONST NOT_USED = 10;
    const DEMAND_NOTE = 11;
    const DEMAND_NOTE2 = 12;
    const PACKED = 13;
    const OFFERED = 14;
    const REMINDER = 15;
}
