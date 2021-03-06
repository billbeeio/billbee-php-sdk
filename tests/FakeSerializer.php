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

namespace BillbeeDe\Tests\BillbeeAPI;

use MintWare\DMM\Serializer\SerializerInterface;

class FakeSerializer implements SerializerInterface
{
    public function deserialize($data)
    {
        return $data;
    }

    public function serialize($data)
    {
        return $data;
    }
}
