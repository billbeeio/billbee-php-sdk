<?php

namespace BillbeeDe\BillbeeAPI\Transformer;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;

class DefaultDateTimeHandler implements SubscribingHandlerInterface
{

    /**
     * @return array{direction: int, format: string, type: string, method: string}[]
     */
    public static function getSubscribingMethods(): array
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

    /**
     * @param array<string, mixed> $type
     */
    public function serializeDateTimeToJson(
        JsonSerializationVisitor $visitor,
        \DateTime $date,
        array $type,
        Context $context
    ): string {
        return $date->format($type['params'][0] ?? 'c');
    }

    /**
     * @param array<string, mixed> $type
     */
    public function deserializeDateTimeToJson(
        JsonDeserializationVisitor $visitor,
        string $dateAsString,
        array $type,
        Context $context
    ): \DateTime {
        return new \DateTime($dateAsString);
    }
}
