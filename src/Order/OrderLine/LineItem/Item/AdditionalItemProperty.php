<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem\Item;

use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Dict\UnitCode;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class AdditionalItemProperty
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem\Item
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-Item/cac-AdditionalItemProperty/
 */
class AdditionalItemProperty implements XmlSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $nameCode;

    /**
     * @var string
     */
    private $listID;

    /**
     * @var string
     */
    private $value;

    /**
     * @var double
     */
    private $valueQuantity;

    /**
     * @var string
     */
    private $unitCode;

    /**
     * @var string
     */
    private $valueQualifier;

    /**
     * Item property name
     * The name of the property.The name must be sufficiently descriptive to define the value.
     * The definition may be supplemented with the property unit of measure when relevant
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Item property name
     * @param string $name
     * The name of the property.The name must be sufficiently descriptive to define the value.<br>
     * The definition may be supplemented with the property unit of measure when relevant
     * @example "Color"
     * @return self
     * @mandatory
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Item property code
     * Code for the item property according to a property code system
     * @return string
     */
    public function getNameCode()
    {
        return $this->nameCode;
    }

    /**
     * Item property code
     * @param string $nameCode
     * Code for the item property according to a property code system
     * @param string $listID
     * Name code list id.<br>
     * An identifier for the code list used for the Name code, this is bilaterally agreed
     * @return self
     * @optional
     */
    public function setNameCode($nameCode, $listID)
    {
        $this->nameCode = $nameCode;
        $this->listID = $listID;
        return $this;
    }

    /**
     * Item property value
     * The value of the item property
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Item property value
     * @param string $value
     * The value of the item property
     * @example "Red"
     * @return self
     * @mandatory
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Item property unit of measure
     * The unit of measure in which the property value is stated, if relevant.
     * May not be relevant when properties are descriptive
     * @return float
     */
    public function getValueQuantity()
    {
        return $this->valueQuantity;
    }

    /**
     * Item property unit of measure
     * @param float $valueQuantity
     * The unit of measure in which the property value is stated, if relevant.
     * May not be relevant when properties are descriptive
     * @param string $unitCode
     * Value quantity unit of measure<br>
     * The unit of measure that applies to the value quantity
     * @example 10, "C62"
     * @return self
     * @optional
     */
    public function setValueQuantity($valueQuantity, $unitCode)
    {
        UnitCode::validate($unitCode);
        $this->valueQuantity = $valueQuantity;
        $this->unitCode = $unitCode;
        return $this;
    }

    /**
     * Property classification
     * Standardized and predefined classification of items properties
     * @return string
     */
    public function getValueQualifier()
    {
        return $this->valueQualifier;
    }

    /**
     * Property classification
     * @param string $valueQualifier
     * Standardized and predefined classification of items properties
     * @return self
     * @optional
     */
    public function setValueQualifier($valueQualifier)
    {
        $this->valueQualifier = $valueQualifier;
        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @throws \InvalidArgumentException An error with information about required data that is missing to write the XML
     * @return void
     */
    public function validate()
    {
        if ($this->name === null) {
            throw new \InvalidArgumentException("Element 'cbc:Name' MUST be provided");
        }

        if ($this->value === null) {
            throw new \InvalidArgumentException("Element 'cbc:Value' MUST be provided");
        }

        if ($this->nameCode !== null && $this->listID === null) {
            throw new \InvalidArgumentException("Attribute 'listID' MUST be present");
        }

        if ($this->valueQuantity !== null) {
            UnitCode::validate($this->unitCode);
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
        $this->validate();

        $writer->write([
            Schema::CBC . 'Name' => $this->name,
        ]);

        if ($this->nameCode !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'NameCode',
                    'value' => $this->nameCode,
                    'attributes' => [
                        'listID' => $this->listID
                    ]
                ]
            ]);

        }

        $writer->write([
            Schema::CBC . 'Value' => $this->value,
        ]);

        if ($this->valueQuantity !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'ValueQuantity',
                    'value' => number_format($this->valueQuantity, 10, '.', ''),
                    'attributes' => [
                        'unitCode' => $this->unitCode
                    ]
                ]
            ]);
        }

        if ($this->valueQualifier !== null) {
            $writer->write([
                Schema::CBC . 'ValueQualifier' => $this->valueQualifier,
            ]);
        }
    }
}
