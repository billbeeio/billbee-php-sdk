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

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\JOM\JsonField;

class Source
{
    /**
     * @var int
     * @JsonField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @JsonField(name="Source", type="string")
     */
    public $source = '';

    /**
     * @var string
     * @JsonField(name="SourceId", type="string")
     */
    public $sourceId = '';

    /**
     * @var string
     * @JsonField(name="ApiAccountName", type="string")
     */
    public $apiAccountName = '';

    /**
     * @var int
     * @JsonField(name="ApiAccountId", type="int")
     */
    public $apiAccountId = '';

    /**
     * @var float
     * @JsonField(name="ExportFactor", type="float")
     */
    public $exportFactor = null;

    /**
     * @var bool
     * @JsonField(name="StockSyncInactive", type="bool")
     */
    public $stockSyncInactive = false;

    /**
     * @var float
     * @JsonField(name="StockSyncMin", type="float")
     */
    public $stockSyncMin = null;

    /**
     * @var float
     * @JsonField(name="StockSyncMax", type="float")
     */
    public $stockSyncMax = null;

    /**
     * @var float
     * @JsonField(name="UnitsPerItem", type="float")
     */
    public $unitsPerItem = 1.00;

    /** Unmapped */
    public $custom = null;
}