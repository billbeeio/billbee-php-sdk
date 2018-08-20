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

use MintWare\JOM\JsonField;

class WebHook
{
    /**
     * @var string
     * @JsonField("Id", type="string")
     */
    public $id;

    /**
     * @var string
     * @JsonField("WebHookUri", type="string")
     */
    public $webHookUri;

    /**
     * @var string
     * @JsonField("Secret", type="string")
     */
    public $secret;

    /**
     * @var string
     * @JsonField("Description", type="string")
     */
    public $description;

    /**
     * @var bool
     * @JsonField("IsPaused", type="bool")
     */
    public $isPaused = false;

    /**
     * @var string[]
     * @JsonField("Filters", type="array")
     * @see \BillbeeDe\BillbeeAPI\Model\WebHookFilter
     */
    public $filters = null;

    /**
     * @var array
     * @JsonField("Headers", type="array")
     */
    public $headers = null;

    /**
     * @var array
     * @JsonField("Properties", type="array")
     */
    public $properties = null;
}
