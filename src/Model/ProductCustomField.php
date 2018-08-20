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

class ProductCustomField
{
    /**
     * @var integer
     * @JsonField("Id", type="integer")
     */
    public $id;

    /**
     * @var integer
     * @JsonField("DefinitionId", type="integer")
     */
    public $definitionId;

    /**
     * @var integer
     * @JsonField("Definition", type="\BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition")
     */
    public $definition;

    /**
     * @var integer
     * @JsonField("ArticleId", type="integer")
     */
    public $articleId;

    /**
     * @var string|array
     * @JsonField("Value", type="string|array")
     */
    public $value;
}
