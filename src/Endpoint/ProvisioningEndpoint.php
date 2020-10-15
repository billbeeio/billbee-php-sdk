<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - 2020 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response as Response;
use Exception;

class ProvisioningEndpoint
{
    /** @var ClientInterface */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Returns information about Billbee terms and conditions
     *
     * @return Response\GetTermsInfoResponse The terms info response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getTermsInfo()
    {
        return $this->client->get(
            'automaticprovision/termsinfo',
            [],
            Response\GetTermsInfoResponse::class
        );
    }
}
