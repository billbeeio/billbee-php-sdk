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

class WebHook
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("WebHookUri")
     */
    public $webHookUri;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Secret")
     */
    public $secret;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Description")
     */
    public $description;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsPaused")
     */
    public $isPaused = false;

    /**
     * @var string[]
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Filters")
     * @see \BillbeeDe\BillbeeAPI\Model\WebHookFilter
     */
    public $filters = null;

    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Headers")
     */
    public $headers = null;

    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Properties")
     */
    public $properties = null;
}
