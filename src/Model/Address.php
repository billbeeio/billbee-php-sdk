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

class Address
{
    /** Not Mapped */
    public $id;

    /**
     * @var string
     * @DataField(name="City", type="string")
     */
    public $city;

    /**
     * @var string
     * @DataField(name="Street", type="string")
     */
    public $street;

    /**
     * @var string
     * @DataField(name="Company", type="string")
     */
    public $company;

    /**
     * @var string
     * @DataField(name="Line2", type="string")
     */
    public $line2;

    /**
     * @var string
     * @DataField(name="Line3", type="string")
     */
    public $line3;

    /**
     * @var string
     * @DataField(name="Zip", type="string")
     */
    public $zip;

    /**
     * @var string
     * @DataField(name="State", type="string")
     */
    public $state;

    /**
     * @var string
     * @DataField(name="Country", type="string")
     */
    public $country;

    /**
     * @var string
     * @DataField(name="CountryISO2", type="string")
     */
    public $countryISO2;

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
     * @DataField(name="Phone", type="string")
     */
    public $phone;

    /**
     * @var string
     * @DataField(name="Email", type="string")
     */
    public $email;

    /**
     * @var string
     * @DataField(name="HouseNumber", type="string")
     */
    public $houseNumber;

    /** Not Mapped */
    public $comment;

    /**
     * @var string
     * @DataField(name="NameAddition", type="string")
     */
    public $nameAddition;
}
