<?php

namespace Volter\OpenPeppol\Order\Party;

use Volter\OpenPeppol\Dict\ISO6523ICD;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Dict\Schema;

/**
 * Class PartyLegalEntity
 * @package Volter\OpenPeppol\Order\Party
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-BuyerCustomerParty/cac-Party/cac-PartyLegalEntity/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-SellerSupplierParty/cac-Party/cac-PartyLegalEntity/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AccountingCustomerParty/cac-Party/cac-PartyLegalEntity/
 */
class PartyLegalEntity implements XmlSerializable
{
    /**
     * @var string
     */
    private $registrationName;

    /**
     * @var string
     */
    private $companyID;

    /**
     * @var string
     */
    private $companySchemeID;

    /**
     * @var RegistrationAddress
     */
    private $registrationAddress;

    /**
     * Buyers legal registration name
     * The official name of the party as registered with the relevant fiscal authority.
     * @return string
     */
    public function getRegistrationName()
    {
        return $this->registrationName;
    }

    /**
     * Buyers legal registration name
     * @param string $registrationName
     * The official name of the party as registered with the relevant fiscal authority
     * @return self
     * @mandatory
     */
    public function setRegistrationName($registrationName)
    {
        $this->registrationName = $registrationName;
        return $this;
    }

    /**
     * Buyers legal registration identifier
     * Identifies a company as registered with the company registration scheme
     * @return string
     */
    public function getCompanyID()
    {
        return $this->companyID;
    }

    /**
     * Buyers legal registration identifier
     * @param string|null $companyID Identifies a company as registered with the company registration scheme
     * @param string|null $schemeID The identification scheme identifier of the buyer legal registration identifier
     * @example "987654321", "0088"
     * @see ISO6523ICD
     * @return self
     * @optional
     */
    public function setCompanyID($companyID = null, $schemeID = null)
    {
        ISO6523ICD::verify($schemeID);
        $this->companyID = $companyID;
        $this->companySchemeID = $schemeID;
        return $this;
    }

    /**
     * Legal address
     * @return RegistrationAddress
     */
    public function getRegistrationAddress()
    {
        return $this->registrationAddress;
    }

    /**
     * Legal address
     * @param RegistrationAddress|null $registrationAddress Legal address
     * @return self
     * @optional
     */
    public function setRegistrationAddress(RegistrationAddress $registrationAddress = null)
    {
        $this->registrationAddress = $registrationAddress;
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
        if ($this->registrationName === null) {
            throw new \InvalidArgumentException("Element 'cbc:RegistrationName' MUST be provided");
        }

        if ($this->companyID !== null && $this->companySchemeID) {
            ISO6523ICD::verify($this->companySchemeID);
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $writer->write([
            Schema::CBC . 'RegistrationName' => $this->registrationName
        ]);

        if ($this->companyID !== null) {

            $attributes = [];
            if ($this->companySchemeID) {
                $attributes['schemeID'] = $this->companySchemeID;
            }

            $writer->write(
                [
                    'name' => Schema::CBC . 'CompanyID',
                    'value' => $this->companyID,
                    'attributes' => $attributes
                ]
            );
        }

        if ($this->registrationAddress !== null) {
            $writer->write([
                Schema::CAC . 'RegistrationAddress' => $this->registrationAddress
            ]);
        }
    }
}
