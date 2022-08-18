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

class ProductCustomField
{
    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("Id")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $id;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("DefinitionId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $definitionId;

    /**
     * @var ?CustomFieldDefinition
     * @Serializer\Type("BillbeeDe\BillbeeAPI\Model\CustomFieldDefinition")
     * @Serializer\SerializedName("Definition")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $definition;

    /**
     * @var ?int
     * @Serializer\Type("int")
     * @Serializer\SerializedName("ArticleId")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $articleId;

    /**
     * @var string|array|null
     * @Serializer\Type("AsIs")
     * @Serializer\SerializedName("Value")
     *
     * @deprecated Use getter/setter instead. Will be private in the next major version.
     */
    public $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getDefinitionId(): ?int
    {
        return $this->definitionId;
    }

    public function setDefinitionId(?int $definitionId): self
    {
        $this->definitionId = $definitionId;
        return $this;
    }

    public function getDefinition(): ?CustomFieldDefinition
    {
        return $this->definition;
    }

    public function setDefinition(?CustomFieldDefinition $definition): self
    {
        $this->definition = $definition;
        return $this;
    }

    public function getArticleId(): ?int
    {
        return $this->articleId;
    }

    public function setArticleId(?int $articleId): self
    {
        $this->articleId = $articleId;
        return $this;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }
}
