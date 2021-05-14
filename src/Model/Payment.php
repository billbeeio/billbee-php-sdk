<?php
/**
 * Created by Florian Kunz <florian@fkunz.de>
 */

namespace BillbeeDe\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Type\PaymentType;
use MintWare\DMM\DataField;

class Payment
{
    /**
     * @var int
     * @DataField(name="BillbeeId", type="int")
     */
    public $id;

    /**
     * @var string
     * @DataField(name="TransactionId", type="string")
     */
    public $transactionId;

    /**
     * @var \DateTime
     * @DataField(name="PayDate", type="datetime")
     */
    public $payDate;

    /**
     * @var int
     * @DataField(name="PaymentType", type="int")
     *
     * @see PaymentType
     */
    public $paymentMethod;

    /**
     * @var string
     * @DataField(name="SourceTechnology", type="string")
     */
    public $sourceTechnology;

    /**
     * @var string
     * @DataField(name="SourceText", type="string")
     */
    public $sourceText;

    /**
     * @var float
     * @DataField(name="PayValue", type="float")
     */
    public $payValue;

    /**
     * @var string
     * @DataField(name="Purpose", type="string")
     */
    public $purpose;

    /**
     * @var string
     * @DataField(name="Name", type="string")
     */
    public $name;
}
