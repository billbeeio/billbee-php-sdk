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

class SearchMode
{
    const _AND = 0;
    const _OR = 1;
    const _EXPERT = 2;
    const _PHRASE_PFX = 3;
    const _SUGGEST = 4;
}