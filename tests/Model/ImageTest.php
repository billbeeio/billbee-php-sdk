<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Image;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ImageTest extends SerializerTestCase
{
    public function testSerialize(): void
    {
        $result = new Image();
        $result
            ->setUrl("https://cdn.stocksnap.io/img-thumbs/960w/fruit-slices_NNIRPAXZFX.jpg")
            ->setId(493289770)
            ->setThumbPathExt("ab665923-d288-45ff-8d9e-410d10dda01e/40986800/100/493289770.png")
            ->setThumbUrl("https://cdn.stocksnap.io/img-thumbs/960w/fruit-slices_NNIRPAXZFX.jpg")
            ->setPosition(3)
            ->setIsDefault(true)
            ->setArticleId(40986800);
        self::assertSerialize('Model/image.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/image.json',
            Image::class,
            function (Image $result) {
                self::assertEquals("https://cdn.stocksnap.io/img-thumbs/960w/fruit-slices_NNIRPAXZFX.jpg", $result->getUrl());
                self::assertEquals(493289770, $result->getId());
                self::assertEquals("ab665923-d288-45ff-8d9e-410d10dda01e/40986800/100/493289770.png", $result->getThumbPathExt());
                self::assertEquals("https://cdn.stocksnap.io/img-thumbs/960w/fruit-slices_NNIRPAXZFX.jpg", $result->getThumbUrl());
                self::assertEquals(3, $result->getPosition());
                self::assertEquals(true, $result->isDefault());
                self::assertEquals(40986800, $result->getArticleId());
            }
        );
    }
}
