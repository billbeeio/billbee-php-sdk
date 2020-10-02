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

class Seller
{
    /**
     * @var string
     * @DataField(name="Platform", type="string")
     */
    public $platform;

    /**
     * @var string
     * @DataField(name="BillbeeShopName", type="string")
     */
    public $shopName;

    /**
     * @var int
     * @DataField(name="BillbeeShopId", type="int")
     */
    public $shopId;

    /**
     * @var string
     * @DataField(name="Id", type="string")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="Nick", type="string")
     */
    public $nick;

    /**
     * @var string
     * @DataField(name="FirstName", type="string")
     */
    public $firstName;

    /**
     * @var string
     * @DataField(name="LastName", type="string")
     */
    public $lastName;

    /**
     * @var string
     * @DataField(name="FullName", type="string")
     */
    public $fullName;

    /**
     * @var string
     * @DataField(name="Email", type="string")
     */
    public $email;
}
