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

class Image
{
    /**
     * @var int
     * @JsonField(name="Id", type="int")
     */
    public $id;

    /**
     * @var string
     * @JsonField(name="Url", type="string")
     */
    public $url = '';

    /**
     * @var string
     * @JsonField(name="ThumbPathExt", type="string")
     */
    public $thumbPathExt = '';

    /**
     * @var string
     * @JsonField(name="ThumbUrl", type="string")
     */
    public $thumbUrl = '';

    /**
     * @var int
     * @JsonField(name="Position", type="int")
     */
    public $position = 1;

    /**
     * @var bool
     * @JsonField(name="IsDefault", type="bool")
     */
    public $isDefault = 1;
}
