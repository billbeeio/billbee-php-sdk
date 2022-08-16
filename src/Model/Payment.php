<?php
/**
 * Created by Florian Kunz <florian@fkunz.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\PaymentType;
use JMS\Serializer\Annotation as Serializer;

class Payment
{
    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("BillbeeId")
     */
    public $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("TransactionId")
     */
    public $transactionId;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("PayDate")
     */
    public $payDate;

    /**
     * @var int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("PaymentType")
     *
     * @see PaymentType
     */
    public $paymentMethod;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SourceTechnology")
     */
    public $sourceTechnology;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SourceText")
     */
    public $sourceText;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("PayValue")
     */
    public $payValue;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Purpose")
     */
    public $purpose;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Name")
     */
    public $name;
}
