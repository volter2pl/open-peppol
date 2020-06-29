<?php

namespace Volter\OpenPeppol\Order\Party;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Dict\TaxSchemeID;

/**
 * Class PartyTaxScheme
 * @package Volter\OpenPeppol\Order\Party
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-BuyerCustomerParty/cac-Party/cac-PartyTaxScheme/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AccountingCustomerParty/cac-Party/cac-PartyTaxScheme/
 */
class PartyTaxScheme implements XmlSerializable
{
    /**
     * @var string
     */
    private $companyID;

    /**
     * @var string
     */
    private $taxScheme;

    /**
     * Buyer TAX identifier
     * The buyers registered Value Added Tax identifier.
     * To be stated in case reverse charge is to apply to the purchase.
     * @return string
     */
    public function getCompanyID()
    {
        return $this->companyID;
    }

    /**
     * Buyer TAX identifier
     * @param string $companyID
     * The buyers registered Value Added Tax identifier.<br>
     * <b>Warning:</b> To be stated in case reverse charge is to apply to the purchase.<br>
     * When TAX is VAT then Party VAT identifiers SHALL have a prefix in accordance with ISO code ISO 3166-1 alpha-2<br>
     * by which the country of issue may be identified. Nevertheless, Greece may use the prefix ‘EL’
     * @return self
     * @mandatory
     */
    public function setCompanyID($companyID)
    {
        $this->companyID = $companyID;
        return $this;
    }

    /**
     * Tax scheme
     * Mandatory element. E.g. "VAT" or "GST"
     * @return string
     */
    public function getTaxScheme()
    {
        return $this->taxScheme;
    }

    /**
     * Tax scheme
     * @param string $taxScheme
     * Mandatory element. E.g. "VAT" or "GST"
     * @example "VAT"
     * @see TaxSchemeID
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
     * @return void
     * @throws \InvalidArgumentException An error with information about required data that is missing to write the XML
     */
    public function validate()
    {
        if ($this->companyID === null) {
            throw new \InvalidArgumentException("Element 'cbc:CompanyID' MUST be provided");
        }

        if ($this->taxScheme === null) {
            throw new \InvalidArgumentException("Element 'cac:TaxScheme' MUST be provided");
        }

        TaxSchemeID::verify($this->taxScheme);
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            Schema::CBC . 'CompanyID' => $this->companyID
        ]);

        $writer->write([
            Schema::CAC . 'TaxScheme' => [Schema::CBC . 'ID' => $this->taxScheme]
        ]);
    }
}
