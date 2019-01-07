<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class Customer
{
    /**
     * @var integer
     * @DataField("Id", type="integer")
     */
    public $id;

    /**
     * @var string
     * @DataField("Name", type="string")
     */
    public $name;

    /**
     * @var string
     * @DataField("Email", type="string")
     */
    public $email;

    /**
     * @var string
     * @DataField("Tel1", type="string")
     */
    public $tel1;

    /**
     * @var string
     * @DataField("Tel2", type="string")
     */
    public $tel2;

    /**
     * @var integer
     * @DataField("Number", type="integer")
     */
    public $number;

    /**
     * @var integer
     * @DataField("PriceGroupId", type="integer")
     */
    public $priceGroupId;

    /**
     * @var integer
     * @DataField("LanguageId", type="integer")
     */
    public $languageId;

    /**
     * @var string
     * @DataField("VatId", type="string")
     */
    public $vatId;
}
