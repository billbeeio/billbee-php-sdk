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

class DeliveryNoteDocument
{
    /**
     * @var string
     * @JsonField(name="OrderNumber", type="string")
     */
    public $orderNumber;

    /**
     * @var string
     * @JsonField(name="DeliveryNoteNumber", type="string")
     */
    public $deliveryNoteNumber;

    /**
     * @var string
     * @JsonField(name="PDFData", type="string")
     */
    public $pdfData;

    /**
     * @var \DateTime
     * @JsonField(name="DeliveryNoteDate", type="datetime")
     */
    public $deliveryNoteDate;

    /**
     * @var string
     * @JsonField(name="PdfDownloadUrl", type="string")
     */
    public $pdfDownloadUrl;
}