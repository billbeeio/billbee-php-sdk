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

class CustomFieldDefinition
{
    /**
     * @var integer
     * @JsonField(name="Id", type="integer")
     */
    public $id;

    /**
     * @var string
     * @JsonField(name="Name", type="string")
     */
    public $name;

    /**
     * @var array
     * @JsonField(name="Configuration", type="array", preTransformer="\BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer")
     */
    public $configuration;

    /**
     * @var integer
     * @see \BillbeeDe\BillbeeAPI\Type\CustomFieldDefinitionType
     * @JsonField(name="Type", type="integer")
     */
    public $type;

    /**
     * @var bool
     * @JsonField(name="IsNullable", type="bool")
     */
    public $isNullable;
}
