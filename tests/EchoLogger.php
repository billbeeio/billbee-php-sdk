<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI;

use Psr\Log\AbstractLogger;

class EchoLogger extends AbstractLogger
{
    /** @inheritdoc */
    public function log($level, $message, array $context = array())
    {
        echo sprintf('[%s] %s: %s' . PHP_EOL, date('Y-m-d H:i:s'), strtoupper($level), $message);
        if (!empty($context)) {
            print_r($context);
            echo PHP_EOL;
        }
    }
}
