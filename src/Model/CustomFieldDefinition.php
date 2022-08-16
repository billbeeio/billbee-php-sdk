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

class CustomFieldDefinition
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     */
    public $name;

    /**
     * @var array
     * @Serializer\Type("CustomField")
     * @Serializer\SerializedName("Configuration")
     */
    public $configuration;

    /**
     * @var integer
     * @see \BillbeeDe\BillbeeAPI\Type\CustomFieldDefinitionType
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Type")
     */
    public $type;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsNullable")
     */
    public $isNullable;
}
