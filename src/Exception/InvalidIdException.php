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

namespace BillbeeDe\BillbeeAPI\Exception;

use InvalidArgumentException;
use Throwable;

class InvalidIdException extends InvalidArgumentException
{
    public function __construct(int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('Id must be an instance of integer and positive', $code, $previous);
    }
}
