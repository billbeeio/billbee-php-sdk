<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class ProductCustomField
{
    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("DefinitionId")
     */
    public $definitionId;

    /**
     * @var integer
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition")
     * @Serializer\SerializedName("Definition")
     */
    public $definition;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ArticleId")
     */
    public $articleId;

    /**
     * @var string|array
     * @Serializer\Type("string|array")
     * @Serializer\SerializedName("Value")
     */
    public $value;
}
