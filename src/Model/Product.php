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

use BillbeeDe\BillbeeAPI\Type\ProductCondition;
use JMS\Serializer\Annotation as Serializer;

class Product
{
    // Product Types
    const TYPE_PRODUCT = 1;
    const TYPE_BUNDLE = 2;

    // VAT Indexes
    const VAT_INDEX_NORMAL = 1;
    const VAT_INDEX_REDUCED = 2;

    // Units
    const UNIT_PIECE = 1;
    const UNIT_PAIR = 15;
    const UNIT_GRAM = 16;
    const UNIT_100_GRAM = 4;
    const UNIT_KG = 2;
    const UNIT_MILLILITER = 6;
    const UNIT_LITER = 5;
    const UNIT_METER = 3;
    const UNIT_SQUARE_METER = 7;
    const UNIT_CUBIC_METER = 8;
    const UNIT_YARD = 9;
    const UNIT_FAT_QUARTER = 10;
    const UNIT_OUNCE = 11;
    const UNIT_LBS = 12;
    const UNIT_FLUID_OUNCE = 13;
    const UNIT_GALLON = 14;

    // Delivery Time
    const DELIVERY_NA = null;
    const DELIVERY_1_2_DAYS = 1;
    const DELIVERY_3_5_DAYS = 2;
    const DELIVERY_6_9_DAYS = 3;
    const DELIVERY_10_14_DAYS = 4;
    const DELIVERY_15_21_DAYS = 5;
    const DELIVERY_4_WEEKS = 6;
    const DELIVERY_5_WEEKS = 7;
    const DELIVERY_6_WEEKS = 8;
    const DELIVERY_7_WEEKS = 9;
    const DELIVERY_8_WEEKS = 10;
    const DELIVERY_9_WEEKS = 11;
    const DELIVERY_10_WEEKS = 12;

    // Recipient
    const RECIPIENT_NA = null;
    const RECIPIENT_BABIES = 1;
    const RECIPIENT_BABY_BOYS = 2;
    const RECIPIENT_BABY_GIRLS = 3;
    const RECIPIENT_WOMAN = 4;
    const RECIPIENT_PETS = 5;
    const RECIPIENT_DOGS = 6;
    const RECIPIENT_TEENAGERS = 7;
    const RECIPIENT_BOYS = 8;
    const RECIPIENT_CATS = 9;
    const RECIPIENT_CHILDREN = 10;
    const RECIPIENT_GIRLS = 11;
    const RECIPIENT_MEN = 12;
    const RECIPIENT_TEEN_BOYS = 13;
    const RECIPIENT_TEEN_GIRLS = 14;
    const RECIPIENT_UNISEX = 15;
    const RECIPIENT_BIRDS = 16;

    // Occasion
    const OCCASION_NA = null;
    const OCCASION_GRADUATION = 1;
    const OCCASION_SYMPATHY = 2;
    const OCCASION_BAR_OR_BAT_MITZVAH = 3;
    const OCCASION_CANADA_DAY = 4;
    const OCCASION_CHINESE_NEW_YEAR = 5;
    const OCCASION_CINCO_DE_MAYO = 6;
    const OCCASION_DAY_OF_THE_DEAD = 7;
    const OCCASION_JULY_4TH = 8;
    const OCCASION_EID = 9;
    const OCCASION_BIRTHDAY = 10;
    const OCCASION_GET_WELL = 11;
    const OCCASION_HALLOWEEN = 12;
    const OCCASION_HANUKKAH = 13;
    const OCCASION_HOUSEWARMING = 14;
    const OCCASION_WEDDING = 15;
    const OCCASION_ANNIVERSARY = 16;
    const OCCASION_CONFIRMATION = 17;
    const OCCASION_KWANZAA = 18;
    const OCCASION_MOTHERS_DAY = 19;
    const OCCASION_NEW_BABY = 20;
    const OCCASION_NEW_YEARS = 21;
    const OCCASION_EASTER = 22;
    const OCCASION_PROM = 23;
    const OCCASION_QUINCEANERA = 24;
    const OCCASION_RETIREMENT = 25;
    const OCCASION_ST_PATRICKS_DAY = 26;
    const OCCASION_SWEET_16 = 27;
    const OCCASION_BAPTISM = 28;
    const OCCASION_THANKSGIVING = 29;
    const OCCASION_VALENTINES = 30;
    const OCCASION_FATHERS_DAY = 31;
    const OCCASION_ENGAGEMENT = 32;
    const OCCASION_CHRISTMAS = 33;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     */
    public $id;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Type")
     */
    public $type = Product::TYPE_PRODUCT;

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Title")
     */
    public $title = null;

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("InvoiceText")
     */
    public $invoiceText = [];

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("ShortDescription")
     */
    public $shortDescription = [];

    /**
     * @var Image[]
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Image[]")
     * @Serializer\SerializedName("Images")
     */
    public $images = [];

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Description")
     */
    public $description = [];

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("BasicAttributes")
     */
    public $attributes = [];

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SKU")
     */
    public $sku = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("EAN")
     */
    public $ean = '';

    /**
     * @var Source[]
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Source[]")
     * @Serializer\SerializedName("Sources")
     */
    public $sources = [];

    /**
     * @var Category
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")
     * @Serializer\SerializedName("Category1")
     */
    public $category1 = null;

    /**
     * @var Category
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")
     * @Serializer\SerializedName("Category2")
     */
    public $category2 = null;

    /**
     * @var Category
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\Category")
     * @Serializer\SerializedName("Category3")
     */
    public $category3 = null;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Manufacturer")
     */
    public $manufacturer = '';

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("VatIndex")
     */
    public $vatIndex = Product::VAT_INDEX_NORMAL;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Price")
     */
    public $price = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("CostPrice")
     */
    public $costPrice = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Vat1Rate")
     */
    public $vatRateNormal = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("Vat2Rate")
     */
    public $vatRateReduced = 0.00;

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Materials")
     */
    public $materials = [];

    /**
     * @var TranslatableText[]
     * @Serializer\Type("array<BillbeeDe\BillbeeAPI\Model\TranslatableText>")
     * @Serializer\SerializedName("Tags")
     */
    public $tags = [];

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockDesired")
     */
    public $stockDesired = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockCurrent")
     */
    public $stockCurrent = 0.00;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockWarning")
     */
    public $stockWarning = 0.00;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("LowStock")
     */
    public $lowStock = false;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("StockCode")
     */
    public $stockCode = '';

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockReduceItemsPerSale")
     */
    public $stockReduceItemsPerSale = 1.0;

    /**
     * @var array
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Stocks")
     */
    public $stocks = [];

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Weight")
     */
    public $weight = 0;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("WeightNet")
     */
    public $weightNet = 0;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Unit")
     */
    public $unit = Product::UNIT_PIECE;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("UnitsPerItem")
     */
    public $unitsPerItem = 1.0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldAmount")
     */
    public $soldAmount = 0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldSumGross")
     */
    public $soldSumGross = 0.0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldSumNet")
     */
    public $soldSumNet = 0.0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldSumNetLast30Days")
     */
    public $soldSumNetLast30Days = 0.0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldSumGrossLast30Days")
     */
    public $soldSumGrossLast30Days = 0.0;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("SoldAmountLast30Days")
     */
    public $soldAmountLast30Days = 0.0;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ShippingProductId")
     */
    public $shippingProductId = 0;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsDigital")
     */
    public $isDigital = false;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsCustomizable")
     */
    public $isCustomizable = false;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("DeliveryTime")
     */
    public $deliveryTime = Product::DELIVERY_NA;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Recipient")
     */
    public $recipient = Product::RECIPIENT_NA;

    /**
     * @var int|null
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Occasion")
     */
    public $occasion = Product::OCCASION_NA;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CountryOfOrigin")
     */
    public $countryOfOrigin = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ExportDescription")
     */
    public $exportDescription = '';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TaricNumber")
     */
    public $taricNumber = '';

    /**
     * @var ProductCustomField[]
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\ProductCustomField[]")
     * @Serializer\SerializedName("CustomFields")
     */
    public $customFields = [];

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Condition")
     *
     * @see ProductCondition
     */
    public $condition = ProductCondition::BRAND_NEW;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("WidthCm")
     */
    public $widthCm;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("LengthCm")
     */
    public $lengthCm;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("HeightCm")
     */
    public $heightCm;

    /**
     * @var BillOfMaterialProduct[]
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\BillOfMaterialProduct[]")
     * @Serializer\SerializedName("BillOfMaterial")
     *
     * @see ProductCondition
     */
    public $billOfMaterial = [];
}
