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

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class WebHook
{
    /**
     * @var string
     * @DataField("Id", type="string")
     */
    public $id;

    /**
     * @var string
     * @DataField("WebHookUri", type="string")
     */
    public $webHookUri;

    /**
     * @var string
     * @DataField("Secret", type="string")
     */
    public $secret;

    /**
     * @var string
     * @DataField("Description", type="string")
     */
    public $description;

    /**
     * @var bool
     * @DataField("IsPaused", type="bool")
     */
    public $isPaused = false;

    /**
     * @var string[]
     * @DataField("Filters", type="array")
     * @see \BillbeeDe\BillbeeAPI\Model\WebHookFilter
     */
    public $filters = null;

    /**
     * @var array
     * @DataField("Headers", type="array")
     */
    public $headers = null;

    /**
     * @var array
     * @DataField("Properties", type="array")
     */
    public $properties = null;
}
