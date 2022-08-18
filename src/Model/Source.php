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

namespace BillbeeDe\BillbeeAPI\Model;

use JMS\Serializer\Annotation as Serializer;

class Source
{
    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id = null;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Source")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $source;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("SourceId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $sourceId;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ApiAccountName")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $apiAccountName;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ApiAccountId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $apiAccountId = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("ExportFactor")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $exportFactor = null;

    /**
     * @var ?bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("StockSyncInactive")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $stockSyncInactive;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockSyncMin")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $stockSyncMin = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("StockSyncMax")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $stockSyncMax = null;

    /**
     * @var ?float
     * @Serializer\Type("float")
     * @Serializer\SerializedName("UnitsPerItem")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $unitsPerItem;

    /**
     * @var ?array<string, mixed>
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Custom")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $custom = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;
        return $this;
    }

    public function getSourceId(): ?string
    {
        return $this->sourceId;
    }

    public function setSourceId(?string $sourceId): self
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    public function getApiAccountName(): ?string
    {
        return $this->apiAccountName;
    }

    public function setApiAccountName(?string $apiAccountName): self
    {
        $this->apiAccountName = $apiAccountName;
        return $this;
    }

    public function getApiAccountId(): ?int
    {
        return $this->apiAccountId;
    }

    public function setApiAccountId(?int $apiAccountId): self
    {
        $this->apiAccountId = $apiAccountId;
        return $this;
    }

    public function getExportFactor(): ?float
    {
        return $this->exportFactor;
    }

    public function setExportFactor(?float $exportFactor): self
    {
        $this->exportFactor = $exportFactor;
        return $this;
    }

    public function getStockSyncInactive(): ?bool
    {
        return $this->stockSyncInactive;
    }

    public function setStockSyncInactive(?bool $stockSyncInactive): self
    {
        $this->stockSyncInactive = $stockSyncInactive;
        return $this;
    }

    public function getStockSyncMin(): ?float
    {
        return $this->stockSyncMin;
    }

    public function setStockSyncMin(?float $stockSyncMin): self
    {
        $this->stockSyncMin = $stockSyncMin;
        return $this;
    }

    public function getStockSyncMax(): ?float
    {
        return $this->stockSyncMax;
    }

    public function setStockSyncMax(?float $stockSyncMax): self
    {
        $this->stockSyncMax = $stockSyncMax;
        return $this;
    }

    public function getUnitsPerItem(): ?float
    {
        return $this->unitsPerItem;
    }

    public function setUnitsPerItem(?float $unitsPerItem): self
    {
        $this->unitsPerItem = $unitsPerItem;
        return $this;
    }

    /** @return ?array<string, mixed> */
    public function getCustom(): ?array
    {
        return $this->custom;
    }

    /** @param ?array<string, mixed> $custom */
    public function setCustom(?array $custom): self
    {
        $this->custom = $custom;
        return $this;
    }
}
