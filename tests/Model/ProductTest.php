<?php

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\BillOfMaterialProduct;
use BillbeeDe\BillbeeAPI\Model\Category;
use BillbeeDe\BillbeeAPI\Model\Image;
use BillbeeDe\BillbeeAPI\Model\Product;
use BillbeeDe\BillbeeAPI\Model\ProductCustomField;
use BillbeeDe\BillbeeAPI\Model\Source;
use BillbeeDe\BillbeeAPI\Model\StockProduct;
use BillbeeDe\BillbeeAPI\Model\TranslatableText;
use BillbeeDe\Tests\BillbeeAPI\SerializerTestCase;

class ProductTest extends SerializerTestCase
{
    public function testSerializeMinimal(): void
    {
        $result = self::getMinimalProduct();
        self::assertSerialize('Model/minimal_product.json', $result);
    }

    public function testDeserializeMinimal(): void
    {
        self::assertDeserialize(
            'Model/minimal_product.json',
            Product::class,
            function (Product $result) {
                self::assertEquals(100000060426878, $result->getId());
                self::assertEquals(19, $result->getVatRateNormal());
                self::assertEquals(7, $result->getVatRateReduced());
                self::assertEquals(1.0, $result->getStockReduceItemsPerSale());
                self::assertEquals(false, $result->getIsDeactivated());
                self::assertCount(1, $result->getTitle());
                self::assertInstanceOf(TranslatableText::class, $result->getTitle()[0]);
                self::assertCount(1, $result->getDescription());
                self::assertInstanceOf(TranslatableText::class, $result->getDescription()[0]);
                self::assertCount(1, $result->getShortDescription());
                self::assertInstanceOf(TranslatableText::class, $result->getShortDescription()[0]);
                self::assertCount(1, $result->getStocks());
                self::assertInstanceOf(StockProduct::class, $result->getStocks()[0]);
            }
        );
    }

    public static function getMinimalProduct(): Product
    {
        return (new Product())
            ->setId(100000060426878)
            ->setTitle([new TranslatableText("minimal", "DE")])
            ->setDescription([new TranslatableText("\n", "DE")])
            ->setShortDescription([new TranslatableText("\n", "DE")])
            ->setVatRateNormal(19)
            ->setVatRateReduced(7)
            ->setStockReduceItemsPerSale(1.0)
            ->setStocks([StockProductTest::getStockProduct()])
            ->setIsDeactivated(false);
    }

    public function testSerialize(): void
    {
        $result = self::getProduct();
        self::assertSerialize('Model/complete_product.json', $result);
    }

    public function testDeserialize(): void
    {
        self::assertDeserialize(
            'Model/complete_product.json',
            Product::class,
            function (Product $result) {
                self::assertEquals('Hersteller', $result->getManufacturer());
                self::assertEquals(100000060427005, $result->getId());
                self::assertEquals(1, $result->getVatIndex());
                self::assertEquals(5.95, $result->getPrice());
                self::assertEquals(2.38, $result->getCostPrice());
                self::assertEquals(19.0, $result->getVatRateNormal());
                self::assertEquals(7.0, $result->getVatRateReduced());
                self::assertEquals(3, $result->getStockDesired());
                self::assertEquals(2, $result->getStockCurrent());
                self::assertEquals(1, $result->getStockWarning());
                self::assertEquals('SKU', $result->getSku());
                self::assertEquals('EAN', $result->getEan());
                self::assertEquals(100, $result->getWeight());
                self::assertEquals(50, $result->getWeightNet());
                self::assertEquals(false, $result->isLowStock());
                self::assertEquals('StockCode', $result->getStockCode());
                self::assertEquals(1.0, $result->getStockReduceItemsPerSale());
                self::assertEquals(1, $result->getType());
                self::assertEquals(1, $result->getUnit());
                self::assertEquals(1.0, $result->getUnitsPerItem());
                self::assertEquals(1.0, $result->getSoldAmount());
                self::assertEquals(20.0, $result->getSoldSumGross());
                self::assertEquals(20.0, $result->getSoldSumNet());
                self::assertEquals(1.0, $result->getSoldAmountLast30Days());
                self::assertEquals(20.0, $result->getSoldSumGrossLast30Days());
                self::assertEquals(20.0, $result->getSoldSumNetLast30Days());
                self::assertEquals(100000000288650, $result->getShippingProductId());
                self::assertEquals(true, $result->isDigital());
                self::assertEquals(true, $result->isCustomizable());
                self::assertEquals(4, $result->getDeliveryTime());
                self::assertEquals(4, $result->getRecipient());
                self::assertEquals(1, $result->getOccasion());
                self::assertEquals('AF', $result->getCountryOfOrigin());
                self::assertEquals('Export Beschreibung', $result->getExportDescription());
                self::assertEquals('TARIC', $result->getTaricNumber());
                self::assertEquals(2, $result->getCondition());
                self::assertEquals(30, $result->getWidthCm());
                self::assertEquals(20, $result->getLengthCm());
                self::assertEquals(40, $result->getHeightCm());
                self::assertEquals(true, $result->getIsDeactivated());

                self::assertInstanceOf(Category::class, $result->getCategory1());
                self::assertInstanceOf(Category::class, $result->getCategory2());
                self::assertInstanceOf(Category::class, $result->getCategory3());

                self::assertCount(2, $result->getInvoiceText());
                self::assertInstanceOf(TranslatableText::class, $result->getInvoiceText()[0]);
                self::assertCount(2, $result->getTitle());
                self::assertInstanceOf(TranslatableText::class, $result->getTitle()[0]);
                self::assertCount(2, $result->getDescription());
                self::assertInstanceOf(TranslatableText::class, $result->getDescription()[0]);
                self::assertCount(2, $result->getShortDescription());
                self::assertInstanceOf(TranslatableText::class, $result->getShortDescription()[0]);
                self::assertCount(2, $result->getAttributes());
                self::assertInstanceOf(TranslatableText::class, $result->getAttributes()[0]);
                self::assertCount(2, $result->getMaterials());
                self::assertInstanceOf(TranslatableText::class, $result->getMaterials()[0]);
                self::assertCount(2, $result->getTags());
                self::assertInstanceOf(TranslatableText::class, $result->getTags()[0]);

                self::assertCount(1, $result->getImages());
                self::assertInstanceOf(Image::class, $result->getImages()[0]);
                self::assertCount(1, $result->getSources());
                self::assertInstanceOf(Source::class, $result->getSources()[0]);
                self::assertCount(1, $result->getStocks());
                self::assertInstanceOf(StockProduct::class, $result->getStocks()[0]);
                self::assertCount(0, $result->getExportDescriptionMultiLanguage());
                self::assertCount(1, $result->getBillOfMaterial());
                self::assertInstanceOf(BillOfMaterialProduct::class, $result->getBillOfMaterial()[0]);
                self::assertCount(1, $result->getCustomFields());
                self::assertInstanceOf(ProductCustomField::class, $result->getCustomFields()[0]);
            }
        );
    }

    public static function getProduct(): Product
    {
        return (new Product())
            ->setManufacturer('Hersteller')
            ->setId(100000060427005)
            ->setVatIndex(1)
            ->setPrice(5.95)
            ->setCostPrice(2.38)
            ->setVatRateNormal(19.0)
            ->setVatRateReduced(7.0)
            ->setStockDesired(3)
            ->setStockCurrent(2)
            ->setStockWarning(1)
            ->setSku('SKU')
            ->setEan('EAN')
            ->setWeight(100)
            ->setWeightNet(50)
            ->setLowStock(false)
            ->setStockCode('StockCode')
            ->setStockReduceItemsPerSale(1.0)
            ->setType(1)
            ->setUnit(1)
            ->setUnitsPerItem(1.0)
            ->setSoldAmount(1.0)
            ->setSoldSumGross(20.0)
            ->setSoldSumNet(20.0)
            ->setSoldAmountLast30Days(1.0)
            ->setSoldSumGrossLast30Days(20.0)
            ->setSoldSumNetLast30Days(20.0)
            ->setShippingProductId(100000000288650)
            ->setIsDigital(true)
            ->setIsCustomizable(true)
            ->setDeliveryTime(4)
            ->setRecipient(4)
            ->setOccasion(1)
            ->setCountryOfOrigin('AF')
            ->setExportDescription('Export Beschreibung')
            ->setTaricNumber('TARIC')
            ->setCondition(2)
            ->setWidthCm(30)
            ->setLengthCm(20)
            ->setHeightCm(40)
            ->setIsDeactivated(true)
            ->setInvoiceText([
                new TranslatableText("Override", "EN"),
                new TranslatableText("Ueberschreiben", "DE"),
            ])
            ->setTitle([
                new TranslatableText("complete", "EN"),
                new TranslatableText("komplett", "DE"),
            ])
            ->setDescription([
                new TranslatableText("Complete long", "EN"),
                new TranslatableText("Komplett lang", "DE"),
            ])
            ->setShortDescription([
                new TranslatableText("Complete short", "EN"),
                new TranslatableText("Komplett kurz", "DE"),
            ])
            ->setAttributes([
                new TranslatableText("Details", "EN"),
                new TranslatableText("Wesentliche Merkmale", "DE"),
            ])
            ->setMaterials([
                new TranslatableText("Material", "EN"),
                new TranslatableText("Material", "DE"),
            ])
            ->setTags([
                new TranslatableText("Tags", "EN"),
                new TranslatableText("Tags", "DE"),
            ])
            ->setImages([ImageTest::getImage()])
            ->setSources([SourceTest::getSource()])
            ->setStocks([StockProductTest::getStockProduct()])
            ->setCategory1(CategoryTest::getCategory())
            ->setCategory2(CategoryTest::getCategory())
            ->setCategory3(CategoryTest::getCategory())
            ->setExportDescriptionMultiLanguage([])
            ->setBillOfMaterial([BillOfMaterialProductTest::getBillOfMaterialProduct()])
            ->setCustomFields([ProductCustomFieldTest::getProductCustomField()]);
    }
}
