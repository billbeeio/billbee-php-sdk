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

namespace BillbeeDe\Tests\BillbeeAPI\Transformer;

use BillbeeDe\BillbeeAPI\Transformer\DefinitionConfigTransformer;
use JMS\Serializer\Context;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use PHPUnit\Framework\TestCase;

class DefinitionConfigTransformerTest extends TestCase
{
    /** @return void */
    public function testTransformWithoutChoices()
    {
        $config = [
            'a' => 'b',
            'c' => 'd',
        ];
        $transformed = DefinitionConfigTransformer::serialize(
            new JsonSerializationVisitor(),
            $config,
            [],
            self::createMock(Context::class)
        );
        $this->assertEquals($config, $transformed);
    }

    /** @return void */
    public function testReverseTransformWithoutChoices()
    {
        $config = [
            'a' => 'b',
            'c' => 'd',
        ];
        $transformed = DefinitionConfigTransformer::deserialize(
            new JsonDeserializationVisitor(),
            $config,
            [],
            self::createMock(Context::class)
        );
        $this->assertEquals($config, $transformed);
    }

    /** @return void */
    public function testTransformWithChoices()
    {
        $config = [
            'a' => 'b',
            'c' => 'd',
            'Choices' => "red\ngreen\nblue",
        ];
        $transformed = DefinitionConfigTransformer::deserialize(
            new JsonDeserializationVisitor(),
            $config,
            [],
            self::createMock(Context::class)
        );
        $this->assertEquals([
            'a' => 'b',
            'c' => 'd',
            'Choices' => ["red", "green", "blue"],
        ], $transformed);
    }

    /** @return void */
    public function testReverseTransformWithChoices()
    {
        $config = [
            'a' => 'b',
            'c' => 'd',
            'Choices' => ["red", "green", "blue"],
        ];
        $transformed = DefinitionConfigTransformer::serialize(
            new JsonSerializationVisitor(),
            $config,
            [],
            self::createMock(Context::class)
        );
        $this->assertEquals([
            'a' => 'b',
            'c' => 'd',
            'Choices' => "red\ngreen\nblue"
        ], $transformed);
    }
}
