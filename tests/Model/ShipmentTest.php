<?php
/**
 * This file is part of the Billbee API package.
 *
 * Copyright 2017 by Billbee GmbH
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * Created by Julian Finkler <julian@mintware.de>
 */

namespace BillbeeDe\Tests\BillbeeAPI\Model;

use BillbeeDe\BillbeeAPI\Model\Shipment;
use BillbeeDe\BillbeeAPI\Model\ShippingProduct;
use BillbeeDe\BillbeeAPI\Model\ShippingProvider;
use PHPUnit\Framework\TestCase;

class ShipmentTest extends TestCase
{
    public function testCreateFromProviderAndProduct()
    {
        /** @var ShippingProvider $provider */
        $provider = $this->createMock(ShippingProvider::class);
        $provider->id = 4711;

        /** @var ShippingProduct $product */
        $product = $this->createMock(ShippingProduct::class);
        $product->id = 1337;

        $shipment = Shipment::fromProviderAndProduct($provider, $product);
        $this->assertSame(4711, $shipment->shippingProviderId);
        $this->assertSame(1337, $shipment->shippingProductId);
    }
}