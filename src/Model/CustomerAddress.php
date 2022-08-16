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

use JMS\Serializer\Annotation as Serializer;

class CustomerAddress
{
    const TYPE_INVOICE = 1;
    const TYPE_DELIVERY = 2;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var integer
     * @Serializer\Type("integer|string")
     * @Serializer\SerializedName("AddressType")
     */
    public $addressType = self::TYPE_INVOICE;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("CustomerId")
     */
    public $customerId;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Company")
     */
    public $company;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FirstName")
     */
    public $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("LastName")
     */
    public $lastName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name2")
     */
    public $name2;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Street")
     */
    public $street;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Housenumber")
     */
    public $houseNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Zip")
     */
    public $zip;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("City")
     */
    public $city;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("State")
     */
    public $state;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryCode")
     */
    public $countryCode;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Email")
     */
    public $email;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tel1")
     */
    public $phone1;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Tel2")
     */
    public $phone2;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Fax")
     */
    public $fax;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("FullAddr")
     */
    public $fullAddress;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("AddressAddition")
     */
    public $addressAddition;
}
