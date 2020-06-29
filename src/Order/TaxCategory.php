<?php

namespace Volter\OpenPeppol\Order;

use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Dict\TaxSchemeID;
use Volter\OpenPeppol\Dict\UNCL5305;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class TaxCategory
 * @package Volter\OpenPeppol\Order
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AllowanceCharge/cac-TaxCategory/
 */
class TaxCategory implements XmlSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var float
     */
    private $percent;

    /**
     * @var string
     */
    private $taxScheme;

    /**
     * TAX category code
     * The TAX category code that applies to the document level allowance or charge
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * TAX category code
     * @param string $id
     * The TAX category code that applies to the document level allowance or charge
     * @example "S"
     * @see UNCL5305
     * @return self
     * @mandatory
     */
    public function setId($id)
    {
        UNCL5305::verify($id);
        $this->id = $id;
        return $this;
    }

    /**
     * TAX rate
     * The TAX rate, represented as percentage that applies to the document level allowance or charge.
     * As this element is of data type percentage, please note that no %-sign should be used.
     * To state 25 %, use value 25.00
     * @return float
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * TAX rate
     * @param float $percent
     * The TAX rate, represented as percentage that applies to the document level allowance or charge.<br>
     * As this element is of data type percentage, please note that no %-sign should be used.<br>
     * To state 25 %, use value 25.00
     * @example 25.00
     * @return self
     * @optional
     */
    public function setPercent($percent)
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
