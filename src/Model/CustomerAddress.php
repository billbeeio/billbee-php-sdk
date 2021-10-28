<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2021 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use MintWare\DMM\DataField;

class CustomerAddress
{
    const TYPE_INVOICE = 1;
    const TYPE_DELIVERY = 2;

    /**
     * @var integer
     * @DataField("Id", type="integer")
     */
    public $id;

    /**
     * @var integer
     * @DataField("AddressType", type="integer|string")
     */
    public $addressType = self::TYPE_INVOICE;

    /**
     * @var integer
     * @DataField("CustomerId", type="integer")
     */
    public $customerId;

    /**
     * @var string
     * @DataField("Company", type="string")
     */
    public $company;

    /**
     * @var string
     * @DataField("FirstName", type="string")
     */
    public $firstName;

    /**
     * @var string
     * @DataField("LastName", type="string")
     */
    public $lastName;

    /**
     * @var string
     * @DataField("Name2", type="string")
     */
    public $name2;

    /**
     * @var string
     * @DataField("Street", type="string")
     */
    public $street;

    /**
     * @var string
     * @DataField("Housenumber", type="string")
     */
    public $houseNumber;

    /**
     * @var string
     * @DataField("Zip", type="string")
     */
    public $zip;

    /**
     * @var string
     * @DataField("City", type="string")
     */
    public $city;

    /**
     * @var string
     * @DataField("State", type="string")
     */
    public $state;

    /**
     * @var string
     * @DataField("CountryCode", type="string")
     */
    public $countryCode;

    /**
     * @var string
     * @DataField("Email", type="string")
     */
    public $email;

    /**
     * @var string
     * @DataField("Tel1", type="string")
     */
    public $phone1;

    /**
     * @var string
     * @DataField("Tel2", type="string")
     */
    public $phone2;

    /**
     * @var string
     * @DataField("Fax", type="string")
     */
    public $fax;

    /**
     * @var string
     * @DataField("FullAddr", type="string")
     */
    public $fullAddress;

    /**
     * @var string
     * @DataField("AddressAddition", type="string")
     */
    public $addressAddition;
}
