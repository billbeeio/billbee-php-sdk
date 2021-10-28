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

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response as Response;
use Exception;

class CloudStorageEndpoint
{
    /** @var ClientInterface */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * Get a list of all cloud storages
     *
     * @return Response\GetCloudStoragesResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getCloudStorages()
    {
        return $this->client->get(
            'cloudstorages',
            [],
            Response\GetCloudStoragesResponse::class
        );
    }
}
