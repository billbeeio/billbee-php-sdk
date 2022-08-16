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

class InvoiceDocument
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("OrderNumber")
     */
    public $orderNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("InvoiceNumber")
     */
    public $invoiceNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PDFData")
     */
    public $pdfData;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\SerializedName("InvoiceDate")
     */
    public $invoiceDate;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalGross")
     */
    public $totalGross;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("TotalNet")
     */
    public $totalNet;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("PdfDownloadUrl")
     */
    public $pdfDownloadUrl;
}
