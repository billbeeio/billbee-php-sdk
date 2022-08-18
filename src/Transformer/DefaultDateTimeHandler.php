<?php

namespace BillbeeDe\BillbeeAPI\Transformer;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

class DefaultDateTimeHandler implements SubscribingHandlerInterface
{
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => 'DateTime',
                'method' => 'serializeDateTimeToJson',
            ],
            [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'DateTime',
                'method' => 'deserializeDateTimeToJson',
            ],
        ];
    }

    public function serializeDateTimeToJson(
        JsonSerializationVisitor $visitor,
        \DateTime $date,
        array $type,
        Context $context
    ) {
        return $date->format($type['params'][0] ?? 'c');
    }

    public function deserializeDateTimeToJson(
        JsonDeserializationVisitor $visitor,
        $dateAsString,
        array $type,
        Context $context
    ) {
        return new \DateTime($dateAsString);
    }
}
