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

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class Source
{
    /**
     * @var int
     * @DataField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="Source", type="string")
     */
    public $source = '';

    /**
     * @var string
     * @DataField(name="SourceId", type="string")
     */
    public $sourceId = '';

    /**
     * @var string
     * @DataField(name="ApiAccountName", type="string")
     */
    public $apiAccountName = '';

    /**
     * @var int
     * @DataField(name="ApiAccountId", type="int")
     */
    public $apiAccountId = '';

    /**
     * @var float
     * @DataField(name="ExportFactor", type="float")
     */
    public $exportFactor = null;

    /**
     * @var bool
     * @DataField(name="StockSyncInactive", type="bool")
     */
    public $stockSyncInactive = false;

    /**
     * @var float
     * @DataField(name="StockSyncMin", type="float")
     */
    public $stockSyncMin = null;

    /**
     * @var float
     * @DataField(name="StockSyncMax", type="float")
     */
    public $stockSyncMax = null;

    /**
     * @var float
     * @DataField(name="UnitsPerItem", type="float")
     */
    public $unitsPerItem = 1.00;

    /** Unmapped */
    public $custom = null;
}
