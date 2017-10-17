<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\JOM\JsonField;

class Address
{
    /** Not Mapped */
    public $id;

    /**
     * @var string
     * @JsonField(name="City", type="string")
     */
    public $city;

    /**
     * @var string
     * @JsonField(name="Street", type="string")
     */
    public $street;

    /**
     * @var string
     * @JsonField(name="Company", type="string")
     */
    public $company;

    /**
     * @var string
     * @JsonField(name="Line2", type="string")
     */
    public $line2;

    /**
     * @var string
     * @JsonField(name="Line3", type="string")
     */
    public $line3;

    /**
     * @var string
     * @JsonField(name="Zip", type="string")
     */
    public $zip;

    /**
     * @var string
     * @JsonField(name="State", type="string")
     */
    public $state;

    /**
     * @var string
     * @JsonField(name="Country", type="string")
     */
    public $country;

    /**
     * @var string
     * @JsonField(name="CountryISO2", type="string")
     */
    public $countryISO2;

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
     * @JsonField(name="Phone", type="string")
     */
    public $phone;

    /**
     * @var string
     * @JsonField(name="Email", type="string")
     */
    public $email;

    /**
     * @var string
     * @JsonField(name="HouseNumber", type="string")
     */
    public $houseNumber;

    /** Not Mapped */
    public $comment;

    /**
     * @var string
     * @JsonField(name="NameAddition", type="string")
     */
    public $nameAddition;
}