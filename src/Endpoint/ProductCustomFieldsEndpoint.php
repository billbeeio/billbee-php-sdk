<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 - now by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\BillbeeAPI\Endpoint;

use BillbeeDe\BillbeeAPI\ClientInterface;
use BillbeeDe\BillbeeAPI\Exception\InvalidIdException;
use BillbeeDe\BillbeeAPI\Exception\QuotaExceededException;
use BillbeeDe\BillbeeAPI\Response as Response;
use Exception;

class ProductCustomFieldsEndpoint
{
    /** @var ClientInterface */
    private $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }


    #region GET

    /**
     * Get a list of all custom fields
     *
     * @param int $page The start page
     * @param int $pageSize The page size
     * @return Response\GetCustomFieldDefinitionsResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws Exception If the response cannot be parsed
     */
    public function getCustomFieldDefinitions($page = 1, $pageSize = 50)
    {
        $query = [
            'page' => max(1, $page),
            'pageSize' => max(1, $pageSize),
        ];

        return $this->client->get(
            'products/custom-fields',
            $query,
            Response\GetCustomFieldDefinitionsResponse::class
        );
    }

    /**
     * Get a single custom field
     *
     * @param int $id The id of the custom field
     * @return Response\GetCustomFieldDefinitionResponse The Response
     *
     * @throws QuotaExceededException If the maximum number of calls per second exceeded
     * @throws InvalidIdException If the id is not an integer or negative
     * @throws Exception If the response cannot be parsed
     */
    public function getCustomFieldDefinition($id)
    {
        if (!is_integer($id) || $id < 1) {
            throw new InvalidIdException();
        }

        return $this->client->get(
            'products/custom-fields/' . $id,
            [],
            Response\GetCustomFieldDefinitionResponse::class
        );
    }

    #endregion
}
