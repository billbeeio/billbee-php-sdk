<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class Source
{
    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     */
    public $id = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Source")
     */
    public $source = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SourceId")
     */
    public $sourceId = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ApiAccountName")
     */
    public $apiAccountName = '';

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ApiAccountId")
     */
    public $apiAccountId = null;

    /**
     * @var float|null
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ExportFactor")
     */
    public $exportFactor = null;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("StockSyncInactive")
     */
    public $stockSyncInactive = false;

    /**
     * @var float|null
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockSyncMin")
     */
    public $stockSyncMin = null;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockSyncMax")
     */
    public $stockSyncMax = null;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("UnitsPerItem")
     */
    public $unitsPerItem = 1.00;

    /** Unmapped */
    public $custom = null;
}
