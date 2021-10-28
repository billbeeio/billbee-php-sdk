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
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /**
     * Sets the logger
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger = null)
    {
        if ($logger == null) {
            $logger = new NullLogger();
        }
        $this->logger = $logger;
    }
}
