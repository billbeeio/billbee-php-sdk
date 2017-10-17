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

namespace BillbeeDe\BillbeeAPI\Type;

class OrderState
{
    CONST ORDERED = 1;
    CONST CONFIRMED = 2;
    CONST PAID = 3;
    CONST SHIPPED = 4;
    CONST RECLAMATION = 5;
    CONST DELETED = 6;
    CONST CLOSED = 7;
    CONST CANCELED = 8;
    CONST ARCHIVED = 9;
    # CONST NOT_USED = 10;
    CONST DEMAND_NOTE = 11;
    CONST DEMAND_NOTE2 = 12;
    CONST PACKED = 13;
    CONST OFFERED = 14;
    CONST REMINDER = 15;
}