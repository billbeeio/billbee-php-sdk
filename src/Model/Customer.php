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

class Customer
{
    /**
     * @var integer
     * @JsonField("Id", type="integer")
     */
    public $id;

    /**
     * @var string
     * @JsonField("Name", type="string")
     */
    public $name;

    /**
     * @var string
     * @JsonField("Email", type="string")
     */
    public $email;

    /**
     * @var string
     * @JsonField("Tel1", type="string")
     */
    public $tel1;

    /**
     * @var string
     * @JsonField("Tel2", type="string")
     */
    public $tel2;

    /**
     * @var integer
     * @JsonField("Number", type="integer")
     */
    public $number;

    /**
     * @var integer
     * @JsonField("PriceGroupId", type="integer")
     */
    public $priceGroupId;

    /**
     * @var integer
     * @JsonField("LanguageId", type="integer")
     */
    public $languageId;

    /**
     * @var string
     * @JsonField("VatId", type="string")
     */
    public $vatId;
}
