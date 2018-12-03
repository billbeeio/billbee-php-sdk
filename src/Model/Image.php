<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2018 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class Image
{
    /**
     * @var int
     * @DataField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="Url", type="string")
     */
    public $url = '';

    /**
     * @var string
     * @DataField(name="ThumbPathExt", type="string")
     */
    public $thumbPathExt = '';

    /**
     * @var string
     * @DataField(name="ThumbUrl", type="string")
     */
    public $thumbUrl = '';

    /**
     * @var int
     * @DataField(name="Position", type="int")
     */
    public $position = 1;

    /**
     * @var bool
     * @DataField(name="IsDefault", type="bool")
     */
    public $isDefault = 1;
}
