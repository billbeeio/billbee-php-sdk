<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@billbee.io>
 */

namespace BillbeeDe\BillbeeAPI\Logger;

use DateTime;
use Psr\Log\LoggerInterface;

class DiagnosticsLogger implements LoggerInterface
{
    const EMERGENCY = 'EMERGENCY';
    const ALERT = 'ALERT';
    const CRITICAL = 'CRITICAL';
    const ERROR = 'ERROR';
    const WARNING = 'WARNING';
    const NOTICE = 'NOTICE';
    const INFO = 'INFO';
    const DEBUG = 'DEBUG';
    /** @var string */
    private $logFile;

    public function __construct(?string $logFile = null)
    {
        if ($logFile === null) {
            $filename = sprintf('billbee_api_%s.log', date('Y-m-d-H-i-s'));
            $logFile = sys_get_temp_dir() . DIRECTORY_SEPARATOR . $filename;
        }

        $this->logFile = $logFile;
    }

    /**
     * @return string The path to the log file
     */
    public function getLogFile()
    {
        return $this->logFile;
    }

    /** @inheritdoc */
    public function emergency(string|\Stringable $message, array $context = []): void
    {
        $this->log(self::EMERGENCY, $message, $context);
    }

    /** @inheritdoc */
    public function alert(string|\Stringable $message, array $context = []): void
    {
        $this->log(self::ALERT, $message, $context);
    }

    /** @inheritdoc */
    public function critical(string|\Stringable $message, array $context = []): void
    {
        $this->log(self::CRITICAL, $message, $context);
    }

    /** @inheritdoc */
    public function error(string|\Stringable $message, array $context = []): void
    {
        $this->log(self::ERROR, $message, $context);
    }

    /** @inheritdoc */
    public function warning(string|\Stringable $message, array $context = []): void
    {
        $this->log(self::WARNING, $message, $context);
    }

    /** @inheritdoc */
    public function notice(string|\Stringable $message, array $context = []): void
    {
        $this->log(self::NOTICE, $message, $context);
    }

    /** @inheritdoc */
    public function info(string|\Stringable $message, array $context = []): void
    {
        $this->log(self::INFO, $message, $context);
    }

    /** @inheritdoc */
    public function debug(string|\Stringable $message, array $context = []): void
    {
        $this->log(self::DEBUG, $message, $context);
    }

    /** @inheritdoc */
    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $level = str_pad($level . ':', 10, ' ', STR_PAD_RIGHT);

        $date = (new DateTime('now'))->format('Y-m-d H:i:s.v');
        $line = sprintf(
            "[%s] %s Message: %s; Context: %s\n",
            $date,
            $level,
            $message,
            json_encode($context, 320)
        );
        $line = str_replace("\\u0000", "", $line);
        file_put_contents($this->logFile, $line, FILE_APPEND);
    }
}
