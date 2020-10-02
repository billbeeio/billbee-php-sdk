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

class ProductCustomField
{
    /**
     * @var integer
     * @DataField("Id", type="integer")
     */
    public $id;

    /**
     * @var integer
     * @DataField("DefinitionId", type="integer")
     */
    public $definitionId;

    /**
     * @var integer
     * @DataField("Definition", type="\BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition")
     */
    public $definition;

    /**
     * @var integer
     * @DataField("ArticleId", type="integer")
     */
    public $articleId;

    /**
     * @var string|array
     * @DataField("Value", type="string|array")
     */
    public $value;
}
