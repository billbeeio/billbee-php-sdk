<?php

namespace BillbeeDe\Tests\BillbeeAPI;

use BillbeeDe\BillbeeAPI\Transformer\AsIsTransformer;
use BillbeeDe\BillbeeAPI\Transformer\DefaultDateTimeHandler;
use BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory;
use PHPUnit\Framework\TestCase;

abstract class SerializerTestCase extends TestCase
{
    protected static function assertSerialize(string $fixtureFile, $obj): void
    {
        $serialized = self::getSerializer()->serialize($obj, 'json');
        $expected = trim(file_get_contents(__DIR__ . '/fixtures/' . $fixtureFile));

        self::assertEquals($expected, $serialized);
    }

    protected static function assertDeserialize(string $fixtureFile, string $targetType, callable $matcher): void
    {
        $json = trim(file_get_contents(__DIR__ . '/fixtures/' . $fixtureFile));
        $deserialized = self::getSerializer()->deserialize($json, $targetType, 'json');
        $matcher($deserialized);
    }

    private static function getSerializer()
    {
        return SerializerBuilder::create()
            ->addDefaultDeserializationVisitors()
            ->addDefaultSerializationVisitors()
            ->addDefaultHandlers()
            ->addDefaultListeners()
            ->setSerializationVisitor(
                'json',
                (new JsonSerializationVisitorFactory())->setOptions(JSON_PRESERVE_ZERO_FRACTION + JSON_PRETTY_PRINT)
            )
            ->configureHandlers(
                function (HandlerRegistry $registry) {
                    $registry->registerSubscribingHandler(new DefinitionConfigTransformer());
                    $registry->registerSubscribingHandler(new AsIsTransformer());
                    $registry->registerSubscribingHandler(new DefaultDateTimeHandler());
                }
            )->build();
    }
}
