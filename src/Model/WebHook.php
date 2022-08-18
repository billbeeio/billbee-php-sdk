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

class WebHook
{
    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("WebHookUri")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $webHookUri;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Secret")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $secret;

    /**
     * @var ?string
     * @Serializer\Type("string")
     * @Serializer\SerializedName("Description")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $description;

    /**
     * @var bool
     * @Serializer\Type("bool")
     * @Serializer\SerializedName("IsPaused")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $isPaused = false;

    /**
     * @var ?string[]
     * @Serializer\Type("array")
     * @Serializer\SerializedName("Filters")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     * @see \BillbeeDe\BillbeeAPI\Model\WebHookFilter
     */
    public $filters = null;

    /**
     * @var array<string, string>
     * @Serializer\Type("array<string, string>")
     * @Serializer\SerializedName("Headers")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $headers = [];

    /**
     * @var array<string, mixed>
     * @Serializer\Type("array<string, AsIs>")
     * @Serializer\SerializedName("Properties")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $properties = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getWebHookUri(): ?string
    {
        return $this->webHookUri;
    }

    public function setWebHookUri(?string $webHookUri): self
    {
        $this->webHookUri = $webHookUri;
        return $this;
    }

    public function getSecret(): ?string
    {
        return $this->secret;
    }

    public function setSecret(?string $secret): self
    {
        $this->secret = $secret;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function isPaused(): bool
    {
        return $this->isPaused;
    }

    public function setIsPaused(bool $isPaused): self
    {
        $this->isPaused = $isPaused;
        return $this;
    }

    public function getFilters(): ?array
    {
        return $this->filters;
    }

    public function setFilters(?array $filters): self
    {
        $this->filters = $filters;
        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): self
    {
        $this->headers = $headers;
        return $this;
    }

    public function getProperties(): array
    {
        return $this->properties;
    }

    public function setProperties(array $properties): self
    {
        $this->properties = $properties;
        return $this;
    }
}
