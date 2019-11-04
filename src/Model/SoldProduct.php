<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class SoldProduct
{
    /**
     * @var string
     * @DataField(name="Id", type="string")
     */
    public $id;

    /**
     * @var int|null
     * @DataField(name="BillbeeId", type="int")
     */
    public $billbeeId;

    /**
     * @var string
     * @DataField(name="Title", type="string")
     */
    public $title;

    /**
     * Weight of one item in gram
     *
     * @var int|null
     * @DataField(name="Weight", type="int")
     */
    public $weight;

    /**
     * @var string
     * @DataField(name="SKU", type="string")
     */
    public $sku;

    /**
     * @var bool
     * @DataField(name="IsDigital", type="bool")
     */
    public $isDigital;

    /**
     * @var string
     * @DataField(name="EAN", type="string")
     */
    public $ean;

    /**
     * @var string
     * @DataField(name="TARICCode", type="string")
     */
    public $taric;

    /**
     * @var string
     * @DataField(name="CountryOfOrigin", type="string")
     */
    public $countryOfOrigin;
}