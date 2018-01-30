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

class InvoiceDocument
{
    /**
     * @var string
     * @JsonField(name="OrderNumber", type="string")
     */
    public $orderNumber;

    /**
     * @var string
     * @JsonField(name="InvoiceNumber", type="string")
     */
    public $invoiceNumber;

    /**
     * @var string
     * @JsonField(name="PDFData", type="string")
     */
    public $pdfData;

    /**
     * @var \DateTime
     * @JsonField(name="InvoiceDate", type="datetime")
     */
    public $invoiceDate;

    /**
     * @var float
     * @JsonField(name="TotalGross", type="float")
     */
    public $totalGross;

    /**
     * @var float
     * @JsonField(name="TotalNet", type="float")
     */
    public $totalNet;

    /**
     * @var string
     * @JsonField(name="PdfDownloadUrl", type="string")
     */
    public $pdfDownloadUrl;
}
