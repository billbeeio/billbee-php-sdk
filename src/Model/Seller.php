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

class Seller
{
    /**
     * @var string
     * @JsonField(name="Platform", type="string")
     */
    public $platform;

    /**
     * @var string
     * @JsonField(name="BillbeeShopName", type="string")
     */
    public $shopName;

    /**
     * @var int
     * @JsonField(name="BillbeeShopId", type="int")
     */
    public $shopId;

    /**
     * @var string
     * @JsonField(name="Id", type="string")
     */
    public $id;

    /**
     * @var string
     * @JsonField(name="Nick", type="string")
     */
    public $nick;

    /**
     * @var string
     * @JsonField(name="FirstName", type="string")
     */
    public $firstName;

    /**
     * @var string
     * @JsonField(name="LastName", type="string")
     */
    public $lastName;

    /**
     * @var string
     * @JsonField(name="FullName", type="string")
     */
    public $fullName;

    /**
     * @var string
     * @JsonField(name="Email", type="string")
     */
    public $email;
}
