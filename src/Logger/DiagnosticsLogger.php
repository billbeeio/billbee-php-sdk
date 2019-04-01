<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2019 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Logger;

use Psr\Log\LoggerInterface;

class DiagnosticsLogger implements LoggerInterface
{
    private $logFile;

    public function __construct($logFile = null)
    {
        if ($logFile === null) {
            $filename = sprintf('billbee_api_%s.log', date('Y-m-d-H-i-s'));
            $logFile = sprintf('%s/%s', __DIR__, $filename);
            if (stristr($logFile, '/vendor/')) {
                $parts = explode('/', '/vendor');
                $logFile = $parts[0] . $filename;
            }
        }

        echo "Diagnostics Output at " . $logFile . PHP_EOL;

        $this->logFile = $logFile;
    }

    /** @inheritdoc */
    public function emergency($message, array $context = array())
    {
        $this->log('EMERGENCY', $message, $context);
    }

    /** @inheritdoc */
    public function alert($message, array $context = array())
    {
        $this->log('ALERT', $message, $context);
    }

    /** @inheritdoc */
    public function critical($message, array $context = array())
    {
        $this->log('CRITICAL', $message, $context);
    }

    /** @inheritdoc */
    public function error($message, array $context = array())
    {
        $this->log('ERROR', $message, $context);
    }

    /** @inheritdoc */
    public function warning($message, array $context = array())
    {
        $this->log('WARNING', $message, $context);
    }

    /** @inheritdoc */
    public function notice($message, array $context = array())
    {
        $this->log('NOTICE', $message, $context);
    }

    /** @inheritdoc */
    public function info($message, array $context = array())
    {
        $this->log('INFO', $message, $context);
    }

    /** @inheritdoc */
    public function debug($message, array $context = array())
    {
        $this->log('DEBUG', $message, $context);
    }

    /** @inheritdoc */
    public function log($level, $message, array $context = array())
    {
        $level = str_pad($level . ':', 9, ' ', STR_PAD_RIGHT);
        /** @noinspection PhpUnhandledExceptionInspection */
        $date = (new \DateTime('now'))->format('Y-m-d H:i:s.v');
        $line = sprintf("[%s] %s Message: %s; Context: %s\n", $date, $level, $message,
            json_encode($context, 320));
        $line = str_replace("\\u0000", "", $line);
        file_put_contents($this->logFile, $line, FILE_APPEND);
    }
}