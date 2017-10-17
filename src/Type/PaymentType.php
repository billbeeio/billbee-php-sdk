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

namespace BillbeeDe\BillbeeAPI\Type;

class PaymentType
{
    const BANK_TRANSFER = 1;
    const CASH_ON_DELIVERY = 2;
    const PAYPAL = 3;
    const CASH = 4;
    const VOUCHER = 6;
    const SOFORTUEBERWEISUNG = 19;
    const MONEY_ORDER = 20; // Etsy Specific
    const CHECK = 21;
    const OTHER = 22;
    const DEBIT = 23;
    const MONEYBOOKERS = 24;
    const KLARNA = 25;
    const INVOICE = 26;
    const MONEYBOOKERS_CREDIT_CARD = 27;
    const MONEYBOOKERS_DEBIT = 28;
    const BILLPAY_INVOICE = 29;
    const BILLPAY_DEBIT = 30;
    const CREDIT_CARD = 31;
    const MAESTRO = 32;
    const IDEAL = 33;
    const EPS = 34;
    const P24 = 35;
    const CLICK_AND_BUY = 36;
    const GIROPAY = 37;
    const NOVALNET_DEBIT = 38;
    const KLARNA_PARTPAYMENT = 39;
    const IPAYMENT_CC = 40;
    const BILLSAFE = 41;
    const TEST_ORDER = 42;
    const WIRECARD_CREDIT_CARD = 43;
    const AMAZON_PAYMENTS = 44;
    const SECUPAY_CREDIT_CARD = 45;
    const SECUPAY_DEBIT = 46;
    const WIRECARD_DEBIT = 47;
    const EC = 48;
    const PAYMILL_CREDIT_CARD = 49;
    const NOVALNET_CREDIT_CARD = 50;
    const NOVALNET_INVOICE = 51;
    const NOVALNET_PAYPAL = 52;
    const PAYMILL = 53;
    const INVOICE_PAYPAL = 54;
    const SELEKKT = 55;
    const AVOCADOSTORE = 56;
    const DIRECT_CHECKOUT = 57;
    const RAKUTEN = 58;
    const PRE_PAYMENT = 59;
    const COMMISSION_SETTLEMENT = 60;
    const AMAZON_MARKETPLACE = 61;
    const AMAZON_PAYMENTS_ADVANCED = 62;
    const STRIPE = 63;
    const BILLPAY_PAYLATER = 64;
    const POSTFINANCE = 65;
    const IZETTLE = 66;
    const SUMUP = 67;
    const PAYLEVEN = 68;
    const ATALANDA = 69;
    const SAFERPAY_CREDIT_CARD = 70;
    const WIRECARD_PAYPAL = 71;
    const MICROPAYMENT = 72;
    const HIRE_PURCHASE = 73;
    const WAYFAIR = 74;
    const MANGOPAY_PAYPAL = 75;
    const MANGOPAY_SOFORTUEBERWEISUNG = 76;
    const MANGOPAY_CREDIT_CARD = 77;
    const MANGOPAY_IDEAL = 78;
    const PAYPAL_EXPRESS = 79;
    const PAYPAL_DEBIT = 80;
    const PAYPAL_CREDIT_CARD = 81;
    const WISH = 82;
}