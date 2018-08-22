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

class CustomerAddress
{
    const TYPE_INVOICE = 1;
    const TYPE_DELIVERY = 2;

    /**
     * @var integer
     * @JsonField("Id", type="integer")
     */
    public $id;

    /**
     * @var integer
     * @JsonField("AddressType", type="integer|string")
     */
    public $addressType = self::TYPE_INVOICE;

    /**
     * @var integer
     * @JsonField("CustomerId", type="integer")
     */
    public $customerId;

    /**
     * @var string
     * @JsonField("Company", type="string")
     */
    public $company;

    /**
     * @var string
     * @JsonField("FirstName", type="string")
     */
    public $firstName;

    /**
     * @var string
     * @JsonField("LastName", type="string")
     */
    public $lastName;

    /**
     * @var string
     * @JsonField("Name2", type="string")
     */
    public $name2;

    /**
     * @var string
     * @JsonField("Street", type="string")
     */
    public $street;

    /**
     * @var string
     * @JsonField("Housenumber", type="string")
     */
    public $houseNumber;

    /**
     * @var string
     * @JsonField("Zip", type="string")
     */
    public $zip;

    /**
     * @var string
     * @JsonField("City", type="string")
     */
    public $city;

    /**
     * @var string
     * @JsonField("State", type="string")
     */
    public $state;

    /**
     * @var string
     * @JsonField("CountryCode", type="string")
     */
    public $countryCode;

    /**
     * @var string
     * @JsonField("Email", type="string")
     */
    public $email;

    /**
     * @var string
     * @JsonField("Tel1", type="string")
     */
    public $phone1;

    /**
     * @var string
     * @JsonField("Tel2", type="string")
     */
    public $phone2;

    /**
     * @var string
     * @JsonField("Fax", type="string")
     */
    public $fax;

    /**
     * @var string
     * @JsonField("FullAddr", type="string")
     */
    public $fullAddress;

    /**
     * @var string
     * @JsonField("AddressAddition", type="string")
     */
    public $addressAddition;
}
