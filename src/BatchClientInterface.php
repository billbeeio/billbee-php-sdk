<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2020 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI;

interface BatchClientInterface
{
    /**
     * Returns the batch pool size
     * @return int
     */
    public function getPoolSize();

    public function enableBatchMode();

    public function disableBatchMode();

    /**
     * @return bool True if the client use batching, otherwise false
     */
    public function isBatchModeEnabled();
}
