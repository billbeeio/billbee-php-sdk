<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Type;

class ProductCondition
{
    const BRAND_NEW = 1;
    const USED_LIKE_NEW = 2;
    const USED_VERY_GOOD = 3;
    const USED_GOOD = 4;
    const USED_IN_ORDER = 5;
    const USED_BAD = 6;
    const BROKEN = 7;
}
