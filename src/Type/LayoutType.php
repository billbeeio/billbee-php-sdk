<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Type;

class LayoutType
{
    const INVOICE = 0;
    const LABEL = 1;
    const DELIVERY_NOTE = 2;
    const ORDER_COMMIT = 3;
    const OFFER = 4;
    const CANCELLATION_INVOICE = 5;
}
