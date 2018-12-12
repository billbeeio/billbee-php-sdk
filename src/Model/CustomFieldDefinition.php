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

class CustomFieldDefinition
{
    /**
     * @var integer
     * @DataField(name="Id", type="integer")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="Name", type="string")
     */
    public $name;

    /**
     * @var array
     * @DataField(name="Configuration", type="array", preTransformer="\BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer")
     */
    public $configuration;

    /**
     * @var integer
     * @see \BillbeeDe\BillbeeAPI\Type\CustomFieldDefinitionType
     * @DataField(name="Type", type="integer")
     */
    public $type;

    /**
     * @var bool
     * @DataField(name="IsNullable", type="bool")
     */
    public $isNullable;
}
