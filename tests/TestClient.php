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

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\ClientInterface;

class TestClient implements ClientInterface
{
    private $requests = [];

    public function get($node, $query, $responseClass)
    {
        return $this->handle('GET', $node, $query, $responseClass);
    }

    public function post($node, $data, $responseClass)
    {
        return $this->handle('POST', $node, $data, $responseClass);
    }

    public function put($node, $data, $responseClass)
    {
        return $this->handle('PUT', $node, $data, $responseClass);
    }

    public function patch($node, $data, $responseClass)
    {
        return $this->handle('PATCH', $node, $data, $responseClass);
    }

    public function delete($node, $query, $responseClass)
    {
        return $this->handle('DELETE', $node, $query, $responseClass);
    }

    public function getRequests()
    {
        return $this->requests;
    }

    public function clearRequests()
    {
        $this->requests = [];
    }

    private function handle($method, $node, $query, $responseClass)
    {
        array_push($this->requests, [
            $method,
            $node,
            $query,
            $responseClass,
        ]);

        return null;
    }
}
