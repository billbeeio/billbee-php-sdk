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

namespace BillbeeDe\BillbeeAPI\Type;

class EventType
{
    const ORDER_IMPORTED = 0;
    const BILL_PRINTED = 1;
    const LABEL_PRINTED = 2;
    const ACCOUNT_CREATED = 3;
    const ACCOUNT_DELETED = 4;
    const ORDER_DELETED = 5;
    const ORDER_DETAIL_DELETED = 6;
    const ORDER_DETAIL_ADDED = 7;
    const ACCOUNT_SYNCED = 8;
    const ORDER_STATE_SYNCED = 9;
    const ORDER_EXPORTED = 10;
    const DELIVERY_NOTE_PRINTED = 11;
    const ORDER_SHIPPED = 12;
    const ORDER_PAID = 13;
    const USER_ASSIGNED_TO_ORDER = 14;
    const ORDER_STATE_CHANGED = 15;
    const CUSTOMERS_JOINED = 16;
    const E_MAIL_CHANGED = 17;
    const SHIPMENT_CREATED = 18;
    const ORDER_COMMIT_PRINTED = 19;
    const ORDER_FORWARDED = 20;
    const ACCOUNT_SYNC_ERROR = 21;
    const CUSTOMER_INVOICE_DOWNLOAD = 22;
    const CUSTOMER_NOTIFIED = 23;
    const ORDER_CANCELED = 24;
    const SHIPMENT_STATUS = 25;
    const CUSTOMER_FILE_DOWNLOAD = 26;
    const PAYMENT_IMPORTED = 27;
    const RULE_EXECUTED = 28;
    const CREATED_BY_API = 29;
    const OFFER_PRINTED = 30;
    const EMAIL_SENT = 31;
    const EMAIL_FAILED = 32;
    const ORDER_FORWARD_FAILED = 33;
    const ORDER_DATA_FORWARD_FAILED = 34;
    const SEND_FILE_TO_CLOUD_DEVICE_FAILED = 35;
    const LOG_IN = 36;
    const LOG_OUT = 37;
    const BOOK_SERVICE = 38;
    const CANCEL_SERVICE = 39;
    const IMPERSONATED = 40;
    const STOCK_SYNCED = 41;
    const STOCK_SYNC_FAILED = 42;
    const UPLOADED_FILE = 43;
    const PAYMENT_BATCH_READ = 44;
    const PAYMENT_BATCH_FAILED = 45;
    const USER_ACCOUNT_PAY_DETAILS_CHANGED = 46;
    const TRANSLATE = 47;
    const PRODUCT_UPLOADED = 48;
    const ORDER_EXPORTED_TO_BOOKKEEPING = 49;
    const ORDER_EXPORT_TO_BOOKKEEPING_FAILED = 50;
    const PAYMENT_EXPORTED_TO_BOOKKEEPING = 51;
    const PAYMENT_EXPORT_TO_BOOKKEEPING_FAILED = 52;
    const ACCOUNT_PAYMENT_TYPE_CHANGED = 53;
    const ACCOUNT_TEST_PHASE_CHANGED = 54;
    const API_USAGE = 55;
    const PRODUCT_UPLOAD_FAILED = 56;
    const RECALCULATED_STOCK_MIN = 57;
    const RECALCULATED_STOCK_DESIRED = 58;
    const SHIPMENT_FAILED = 59;
    const CUSTOMER_FILE_DOWNLOAD_DA_WANDA = 60;
    const ORDER_DETAIL_MODIFIED = 61;
    const ORDER_MODIFIED = 62;
    const ORDER_STATE_TRANSFERED = 63;
    const ORDER_STATE_TRANSFER_FAILED = 64;
    const PAYMENT_CREATED = 65;
    const SHOP_CATEGORY_SYNC_ERROR = 66;
    const BILLBEE_INVOICE_PAYED = 67;
    const BILLBEE_INVOICE_PAYMENT_FAILED = 68;
    const SHOP_CREATED = 69;
    const SHOP_MODIFIED = 70;
    const SHOP_DELETED = 71;
    const SHOP_CONVERTED = 72;
    const RULE_FAILED = 73;
    const LOW_STOCK = 74;
    const ARTICLE_IMPORT_FINISHED = 75;
    const FEATURE_FUNDING_AMOUNT_CHANGED = 76;
}
