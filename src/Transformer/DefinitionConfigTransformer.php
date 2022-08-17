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

class DefinitionConfigTransformer implements SubscribingHandlerInterface
{
    /** @inheritdoc */
    public static function serialize(JsonSerializationVisitor $visitor, array $data, array $type, Context $context)
    {
        if (isset($data['Choices']) && is_array($data['Choices'])) {
            $data['Choices'] = implode("\n", $data['Choices']);
        }
        return $data;
    }

    /** @inheritdoc */
    public static function deserialize(JsonDeserializationVisitor $visitor, $data, array $type, Context $context)
    {
        if (isset($data['Choices']) && !is_array($data['Choices'])) {
            $data['Choices'] = explode("\n", $data['Choices']);
        }
        return $data;
    }

    public static function getSubscribingMethods(): array
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'CustomField',
                'method' => 'serialize',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'CustomField',
                'method' => 'deserialize',
            ],
        ];
    }
}
