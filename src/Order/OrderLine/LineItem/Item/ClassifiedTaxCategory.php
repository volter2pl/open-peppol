<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem\Item;

use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Dict\TaxSchemeID;
use Volter\OpenPeppol\Dict\UNCL5305;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class ClassifiedTaxCategory
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem\Item
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-Item/cac-ClassifiedTaxCategory/
 */
class ClassifiedTaxCategory implements XmlSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $percent;

    /**
     * @var string
     */
    private $taxScheme;

    /**
     * Item TAX category code
     * The TAX category code for the item.
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Item TAX category code
     * @param string $id
     * The TAX category code for the item.
     * @example "S"
     * @see UNCL5305
     * @return self
     * @mandatory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Line TAX rate
     * The TAX percentage rate that applies to the line amount.
     * @return int
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Line TAX rate
     * @param int|null $percent
     * The TAX percentage rate that applies to the line amount.
     * @example 25
     * @return self
     * @optional
     */
    public function setPercent($percent = null)
    {
        $this->percent = $percent;
        return $this;
    }

    /**
     * Tax scheme. E.g. “VAT” or “GST”
     * @return string
     */
    public function getTaxScheme()
    {
        return $this->taxScheme;
    }

    /**
     * Tax scheme. E.g. “VAT” or “GST”
     * @param string $taxScheme
     * Example value: VAT or GST
     * @example “VAT” or “GST”
     * @return self
     * @mandatory
     */
    public function setTaxScheme($taxScheme)
    {
        TaxSchemeID::verify($taxScheme);
        $this->taxScheme = $taxScheme;
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
        UNCL5305::verify($this->id);
        TaxSchemeID::verify($this->taxScheme);
        if ($this->id === UNCL5305::S && $this->percent <= 0) {
            throw new \InvalidArgumentException(
                'When TAX category code is "Standard rated" (S) the TAX rate SHALL be greater than zero'
            );
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
            Schema::CBC . 'ID' => $this->id,
        ]);

        if ($this->percent !== null) {
            $writer->write([
                Schema::CBC . 'Percent' => number_format($this->percent, 2, '.', ''),
            ]);
        }

        $writer->write([
            Schema::CAC . 'TaxScheme' => [Schema::CBC . 'ID' => $this->taxScheme],
        ]);
    }
}
