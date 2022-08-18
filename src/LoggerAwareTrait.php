<?php

namespace BillbeeDe\BillbeeAPI;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

trait LoggerAwareTrait
{
    /** @var LoggerInterface */
    protected $logger;

    /**
     * Returns the current registered logger
     */
    public function getLogger(): LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Sets the logger
     */
    public function setLogger(LoggerInterface $logger = null): void
    {
        if ($logger == null) {
            $logger = new NullLogger();
        }
        $this->logger = $logger;
    }
}
