<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem\Item;

use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class Item
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem\Item
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-Item/
 */
class Item implements XmlSerializable
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $buyersItemIdentification;

    /**
     * @var string
     */
    private $sellersItemIdentification;

    /**
     * @var string
     */
    private $standardItemIdentification;

    /**
     * @var string[]
     */
    private $itemSpecificationDocumentReferences;

    /**
     * @var CommodityClassification[]
     */
    private $commodityClassification;

    /**
     * @var ClassifiedTaxCategory
     */
    private $classifiedTaxCategory;

    /**
     * @var AdditionalItemProperty[]
     */
    private $additionalItemProperties;

    /**
     * @var ItemInstance[]
     */
    private $itemInstances;

    /**
     * Item description
     * Free-form field that can be used to give a text description of the item. A detailed description of the item.
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Item description
     * @param string|null $description
     * Free-form field that can be used to give a text description of the item. A detailed description of the item.
     * @return self
     * @optional
     */
    public function setDescription($description = null)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Item name
     * A short name for an item. A short name given to an item,
     * such as a name from a Catalogue, as distinct from a description.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Item name
     * @param string $name
     * A short name for an item. A short name given to an item,<br>
     * such as a name from a Catalogue, as distinct from a description.
     * @return self
     * @mandatory
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Buyers item identifier
     * An identifier, assigned by the buyer, for the item. Associates the item with
     * its identification according to the buyer's system.
     * @return string
     */
    public function getBuyersItemIdentification()
    {
        return $this->buyersItemIdentification;
    }

    /**
     * Buyers item identifier
     * @param string|null $buyersItemIdentification
     * An identifier, assigned by the buyer, for the item. Associates the item with<br>
     * its identification according to the buyer's system.
     * @example "abc32432"
     * @return self
     * @optional
     */
    public function setBuyersItemIdentification($buyersItemIdentification = null)
    {
        $this->buyersItemIdentification = $buyersItemIdentification;
        return $this;
    }

    /**
     * The Sellers item identifier
     * An identifier, assigned by the seller, for the item. Associates the item with
     * its identification according to the seller's system.
     * @return string
     */
    public function getSellersItemIdentification()
    {
        return $this->sellersItemIdentification;
    }

    /**
     * The Sellers item identifier
     * @param string|null $sellersItemIdentification
     * An identifier, assigned by the seller, for the item. Associates the item with<br>
     * its identification according to the seller's system.
     * @example "3249834"
     * @return self
     * @optional
     */
    public function setSellersItemIdentification($sellersItemIdentification = null)
    {
        $this->sellersItemIdentification = $sellersItemIdentification;
        return $this;
    }

    /**
     * Item standard identifier
     * An item identifier based on a registered scheme. Associates the item with
     * its identification according to a standard system.
     * @return string
     */
    public function getStandardItemIdentification()
    {
        return $this->standardItemIdentification;
    }

    /**
     * Item standard identifier
     * @param string|null $standardItemIdentification
     * An item identifier based on a registered scheme. Associates the item with<br>
     * its identification according to a standard system.
     * @example "05704066204093"
     * @return self
     * @optional
     */
    public function setStandardItemIdentification($standardItemIdentification = null)
    {
        $this->standardItemIdentification = $standardItemIdentification;
        return $this;
    }

    /**
     * Item specification reference
     * Reference to an external document (ID) when it is necessary to specify the details of the item.
     * Referece to an item specification document
     * @return string[]
     */
    public function getItemSpecificationDocumentReferences()
    {
        return $this->itemSpecificationDocumentReferences;
    }

    /**
     * Item specification reference
     * @param string[]|null $itemSpecificationDocumentReferences
     * Reference to an external document (ID) when it is necessary to specify the details of the item.<br>
     * Referece to an item specification document
     * @example ["doc4353.pdf"]
     * @return self
     * @optional
     */
    public function setItemSpecificationDocumentReferences(array $itemSpecificationDocumentReferences = null)
    {
        $this->itemSpecificationDocumentReferences = $itemSpecificationDocumentReferences;
        return $this;
    }

    /**
     * @return CommodityClassification[]
     */
    public function getCommodityClassifications()
    {
        return $this->commodityClassification;
    }

    /**
     * @param CommodityClassification[]|null $commodityClassification
     * @return $this
     * @optional
     */
    public function setCommodityClassifications(array $commodityClassification = null)
    {
        $this->commodityClassification = $commodityClassification;
        return $this;
    }

    /**
     * Line TAX information
     * @return ClassifiedTaxCategory
     */
    public function getClassifiedTaxCategory()
    {
        return $this->classifiedTaxCategory;
    }

    /**
     * Line TAX information
     * @param ClassifiedTaxCategory|null $classifiedTaxCategory Line TAX information
     * @return self
     * @optional
     */
    public function setClassifiedTaxCategory(ClassifiedTaxCategory $classifiedTaxCategory = null)
    {
        $this->classifiedTaxCategory = $classifiedTaxCategory;
        return $this;
    }

    /**
     * Additional item property information
     * A group of business terms providing information about properties of the goods and services invoiced.
     * @return AdditionalItemProperty[]
     */
    public function getAdditionalItemProperties()
    {
        return $this->additionalItemProperties;
    }

    /**
     * Additional item property information
     * @param AdditionalItemProperty[]|null $additionalItemProperties
     * A group of business terms providing information about properties of the goods and services invoiced.
     * @return self
     * @optional
     */
    public function setAdditionalItemProperties($additionalItemProperties = null)
    {
        $this->additionalItemProperties = $additionalItemProperties;
        return $this;
    }

    /**
     * Item instance information
     * Information relevant to an item instance or shared by the items in the order line.
     * @return ItemInstance[]
     */
    public function getItemInstances()
    {
        return $this->itemInstances;
    }

    /**
     * Item instance information
     * @param ItemInstance[] $itemInstances
     * Information relevant to an item instance or shared by the items in the order line.
     * @return self
     * @optional
     */
    public function setItemInstances($itemInstances)
    {
        $this->itemInstances = $itemInstances;
        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @return void
     * @throws \InvalidArgumentException An error with information about required data that is missing to write the XML
     */
    public function validate()
    {
        if (empty($this->name)) {
            throw new \InvalidArgumentException("Element 'cbc:Name' MUST be provided");
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        if ($this->description !== null) {
            $writer->write([
                Schema::CBC . 'Description' => $this->description
            ]);
        }

        $writer->write([
            Schema::CBC . 'Name' => $this->name
        ]);

        if ($this->buyersItemIdentification !== null) {
            $writer->write([
                Schema::CAC . 'BuyersItemIdentification' => [
                    Schema::CBC . 'ID' => $this->buyersItemIdentification
                ],
            ]);
        }

        if ($this->sellersItemIdentification !== null) {
            $writer->write([
                Schema::CAC . 'SellersItemIdentification' => [
                    Schema::CBC . 'ID' => $this->sellersItemIdentification
                ],
            ]);
        }

        if ($this->standardItemIdentification !== null) {
            $writer->write([
                Schema::CAC . 'StandardItemIdentification' => [
                    Schema::CBC . 'ID' => $this->standardItemIdentification
                ],
            ]);
        }

        if ($this->itemSpecificationDocumentReferences !== null) {
            foreach ($this->itemSpecificationDocumentReferences as $itemSpecificationDocumentReference) {
                $writer->write([
                    Schema::CAC . 'ItemSpecificationDocumentReference' => [
                        Schema::CBC . 'ID' => $itemSpecificationDocumentReference
                    ],
                ]);
            }
        }

        if ($this->commodityClassification !== null) {
            foreach ($this->commodityClassification as $commodityClassification) {
                $writer->write([
                    Schema::CAC . 'CommodityClassification' => $commodityClassification
                ]);
            }
        }

        if ($this->classifiedTaxCategory !== null) {
            $writer->write([
                Schema::CAC . 'ClassifiedTaxCategory' => $this->classifiedTaxCategory
            ]);
        }

        if ($this->additionalItemProperties !== null) {
            foreach ($this->additionalItemProperties as $additionalItemProperty) {
                $writer->write([
                    Schema::CAC . 'AdditionalItemProperty' => $additionalItemProperty
                ]);
            }
        }

        if ($this->itemInstances !== null) {
            foreach ($this->itemInstances as $itemInstance) {
                $writer->write([
                    Schema::CAC . 'ItemInstance' => $itemInstance
                ]);
            }
        }
    }
}
