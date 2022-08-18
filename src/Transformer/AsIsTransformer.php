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

namespace BillbeeDe\BillbeeAPI\Transformer;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

class AsIsTransformer implements SubscribingHandlerInterface
{

    /**
     * @template T
     * @param T $data
     * @param array<string, mixed> $type
     * @return T
     */
    public static function serialize(JsonSerializationVisitor $visitor, $data, array $type, Context $context)
    {
        return $data;
    }

    /**
     * @template T
     * @param T $data
     * @param array<string, mixed> $type
     * @return T
     */
    public static function deserialize(JsonDeserializationVisitor $visitor, $data, array $type, Context $context)
    {
        return $data;
    }

    /**
     * @return array{direction: int, format: string, type: string, method: string}[]
     */
    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'AsIs',
                'method' => 'serialize',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'AsIs',
                'method' => 'deserialize',
            ],
        ];
    }
}
