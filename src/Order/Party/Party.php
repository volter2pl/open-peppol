<?php

namespace Volter\OpenPeppol\Order\Party;

use Volter\OpenPeppol\Dict\ISO6523ICD;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Dict\EAS;
use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Order\Common\Address;

/**
 * Class Party
 * @package Volter\OpenPeppol\Order\Party
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-BuyerCustomerParty/cac-Party/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-SellerSupplierParty/cac-Party/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OriginatorCustomerParty/cac-Party/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AccountingCustomerParty/cac-Party/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-Delivery/cac-DeliveryParty/
 */
class Party implements XmlSerializable
{
    const BUYER_CUSTOMER_PARTY = 'BuyerCustomerParty';
    const SELLER_SUPPLIER_PARTY = 'SellerSupplierParty';
    const ORIGINATOR_CUSTOMER_PARTY = 'OriginatorCustomerParty';
    const ACCOUNTING_CUSTOMER_PARTY = 'AccountingCustomerParty';
    const DELIVERY_PARTY = 'DeliveryParty';

    /**
     * @var string
     */
    private $endpointID;

    /**
     * @var string
     */
    private $endpointSchemeID;

    /**
     * @var string
     */
    private $partyIdentificationSchemeID;

    /**
     * @var string
     */
    private $partyIdentification;

    /**
     * @var string
     */
    private $partyName;

    /**
     * @var Address
     */
    private $postalAddress;

    /**
     * @var PartyTaxScheme
     */
    private $partyTaxScheme;

    /**
     * @var PartyLegalEntity
     */
    private $partyLegalEntity;

    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var string
     */
    private $type;
    /**
     * @var |null
     */

    /**
     * Party constructor.
     * @param string $type
     */
    public function __construct($type)
    {
        $availableTypes = [
            self::ACCOUNTING_CUSTOMER_PARTY,
            self::BUYER_CUSTOMER_PARTY,
            self::ORIGINATOR_CUSTOMER_PARTY,
            self::SELLER_SUPPLIER_PARTY,
            self::DELIVERY_PARTY
        ];

        if (!in_array($type, $availableTypes)) {
            throw new \InvalidArgumentException("Type must be one of: " . implode(', ', $availableTypes));
        }

        $this->type = $type;
    }

    /**
     * Invoicee party electronic address
     * Identifies the invoicee party's electronic address
     * @return string
     */
    public function getEndpointID()
    {
        return $this->endpointID;
    }

    /**
     * Invoicee party electronic address
     * @param string $endpointID
     * Identifies the invoicee party's electronic address
     *
     * @param string $schemeID
     * Scheme identifier for party identification
     *
     * @see EAS
     * @example "7300010000001", EAS::CODE_9945
     * @return self
     *
     * @mandatory for BuyerCustomerParty
     * @mandatory for SellerSupplierParty
     * @not-exists for OriginatorCustomerParty
     * @optional for AccountingCustomerParty
     * @not-exists for DeliveryParty
     */
    public function setEndpointID($endpointID, $schemeID)
    {
        EAS::verify($schemeID);
        $this->endpointID = $endpointID;
        $this->endpointSchemeID = $schemeID;
        return $this;
    }

    /**
     * Party identification
     * Identification of the invoicee party
     * @return string
     */
    public function getPartyIdentification()
    {
        return $this->partyIdentification;
    }

    /**
     * Party identification
     * @param string $partyIdentification Identification of the invoicee party
     * @param null $schemeID Scheme identifier for party identification
     * @example "7300010000001", "0088"
     * @see ISO6523ICD
     * @return self
     * @optional for BuyerCustomerParty
     * @optional for SellerSupplierParty
     * @optional for OriginatorCustomerParty
     * @optional for AccountingCustomerParty
     * @optional for DeliveryParty
     */
    public function setPartyIdentification($partyIdentification, $schemeID = null)
    {
        if ($schemeID !== null) {
            ISO6523ICD::verify($schemeID);
        }

        $this->partyIdentification = $partyIdentification;
        $this->partyIdentificationSchemeID = $schemeID;
        return $this;
    }

    /**
     * Party name
     * @return string
     */
    public function getPartyName()
    {
        return $this->partyName;
    }

    /**
     * Party name
     * @param string $partyName The name of the party
     * @example "Buyer name"
     * @example "Seller name"
     * @example "Originator name"
     * @example "Invoicee name"
     * @return self
     * @optional for BuyerCustomerParty
     * @optional for SellerSupplierParty
     * @optional for OriginatorCustomerParty
     * @optional for AccountingCustomerParty
     * @mandatory for DeliveryParty
     */
    public function setPartyName($partyName)
    {
        $this->partyName = $partyName;
        return $this;
    }

    /**
     * Postal address
     * Postal address of the invoicee
     * @return Address
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * Postal address
     * @param Address $postalAddress Postal address of the invoicee
     * @return self
     * @optional for BuyerCustomerParty
     * @mandatory for SellerSupplierParty
     * @not-exists for OriginatorCustomerParty
     * @mandatory for AccountingCustomerParty
     * @optional for DeliveryParty
     */
    public function setPostalAddress(Address $postalAddress)
    {
        $this->postalAddress = $postalAddress;
        return $this;
    }

    /**
     * Party tax scheme
     * Tax information of the invoicee party
     * @return PartyTaxScheme
     */
    public function getPartyTaxScheme()
    {
        return $this->partyTaxScheme;
    }

    /**
     * Party tax scheme
     * @param PartyTaxScheme $partyTaxScheme Tax information of the invoicee party
     * @return self
     * @optional for BuyerCustomerParty
     * @not-exists for SellerSupplierParty
     * @not-exists for OriginatorCustomerParty
     * @optional for AccountingCustomerParty
     * @not-exists for DeliveryParty
     */
    public function setPartyTaxScheme(PartyTaxScheme $partyTaxScheme)
    {
        $this->partyTaxScheme = $partyTaxScheme;
        return $this;
    }

    /**
     * Party legal entity
     * Legal information of the invoicee party
     * @return PartyLegalEntity
     */
    public function getPartyLegalEntity()
    {
        return $this->partyLegalEntity;
    }

    /**
     * Party legal entity
     * @param PartyLegalEntity $partyLegalEntity Legal information of the invoicee party
     * @return self
     * @mandatory for BuyerCustomerParty
     * @mandatory for SellerSupplierParty
     * @not-exists for OriginatorCustomerParty
     * @mandatory for AccountingCustomerParty
     * @not-exists for DeliveryParty
     */
    public function setPartyLegalEntity(PartyLegalEntity $partyLegalEntity)
    {
        $this->partyLegalEntity = $partyLegalEntity;
        return $this;
    }

    /**
     * Contact
     * Invoicee contact information
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Contact
     * @param Contact $contact Invoicee contact information
     * @return self
     * @optional for BuyerCustomerParty
     * @optional for SellerSupplierParty
     * @optional for OriginatorCustomerParty
     * @optional for AccountingCustomerParty
     * @optional for DeliveryParty
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
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
        switch ($this->type) {
            case self::BUYER_CUSTOMER_PARTY:
                $this->validateBuyerCustomerParty();
                break;
            case self::SELLER_SUPPLIER_PARTY:
                $this->validateSellerSupplierParty();
                break;
            case self::ORIGINATOR_CUSTOMER_PARTY:
                $this->validateOriginatorCustomerParty();
                break;
            case self::ACCOUNTING_CUSTOMER_PARTY:
                $this->validateAccountingCustomerParty();
                break;
            case self::DELIVERY_PARTY:
                $this->validateDeliveryParty();
                break;
        }
    }

    /**
     * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-BuyerCustomerParty/cac-Party/
     */
    private function validateBuyerCustomerParty()
    {
        if ($this->endpointID === null) {
            throw new \InvalidArgumentException("Element 'cbc:EndpointID' MUST be provided");
        }

        if ($this->partyLegalEntity === null) {
            throw new \InvalidArgumentException("Element 'cac:PartyLegalEntity' MUST be provided");
        }
    }

    /**
     * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-SellerSupplierParty/cac-Party/
     */
    private function validateSellerSupplierParty()
    {
        if ($this->endpointID === null) {
            throw new \InvalidArgumentException("Element 'cbc:EndpointID' MUST be provided");
        }

        if ($this->postalAddress === null) {
            //TODO: throw new \InvalidArgumentException("Element 'cac:PostalAddress' MUST be provided");
        }

        if ($this->partyLegalEntity === null) {
            throw new \InvalidArgumentException("Element 'cac:PartyLegalEntity' MUST be provided");
        }

        if ($this->partyTaxScheme !== null) {
            throw new \InvalidArgumentException("Document MUST NOT contain elements not part of the data model");
        }
    }

    /**
     * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OriginatorCustomerParty/cac-Party/
     */
    private function validateOriginatorCustomerParty()
    {
        if (
            $this->endpointID !== null ||
            $this->postalAddress !== null ||
            $this->partyTaxScheme !== null ||
            $this->partyLegalEntity !== null
        ) {
            throw new \InvalidArgumentException("Document MUST NOT contain elements not part of the data model");
        }
    }

    private function validateAccountingCustomerParty()
    {
        if ($this->postalAddress === null) {
            throw new \InvalidArgumentException("Element 'cac:PostalAddress' MUST be provided");
        }

        if ($this->partyLegalEntity === null) {
            throw new \InvalidArgumentException("Element 'cac:PartyLegalEntity' MUST be provided");
        }

        if ($this->partyIdentification !== null && $this->partyIdentificationSchemeID !== null) {
            ISO6523ICD::verify($this->partyIdentificationSchemeID);
        }
    }

    private function validateDeliveryParty()
    {
        if ($this->partyName === null) {
            throw new \InvalidArgumentException("Element 'cac:PartyName' MUST be provided");
        }

        if (
            $this->endpointID !== null ||
            $this->partyTaxScheme !== null ||
            $this->partyLegalEntity !== null
        ) {
            throw new \InvalidArgumentException("Document MUST NOT contain elements not part of the data model");
        }

    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        $this->validate();

        if ($this->endpointID !== null) {
            $writer->write(
                [
                    'name' => Schema::CBC . 'EndpointID',
                    'value' => $this->endpointID,
                    'attributes' => [
                        'schemeID' => $this->endpointSchemeID
                    ]
                ]
            );
        }

        if ($this->partyIdentification !== null) {

            $attributes = [];
            if ($this->partyIdentificationSchemeID !== null) {
                $attributes['schemeID'] = $this->partyIdentificationSchemeID;
            }

            $writer->write([
                Schema::CAC . 'PartyIdentification' => [
                    [
                        'name' => Schema::CBC . 'ID',
                        'value' => $this->partyIdentification,
                        'attributes' => $attributes
                    ]
                ]
            ]);
        }

        if ($this->partyName !== null) {
            $writer->write([
                Schema::CAC . 'PartyName' => [Schema::CBC . 'Name' => $this->partyName],
            ]);
        }

        if ($this->postalAddress !== null) {
            $writer->write([
                Schema::CAC . 'PostalAddress' => $this->postalAddress,
            ]);
        }

        if ($this->partyTaxScheme !== null) {
            $writer->write([
                Schema::CAC . 'PartyTaxScheme' => $this->partyTaxScheme,
            ]);
        }

        if ($this->partyLegalEntity !== null) {
            $writer->write([
                Schema::CAC . 'PartyLegalEntity' => $this->partyLegalEntity,
            ]);
        }

        if ($this->contact !== null) {
            $writer->write([
                Schema::CAC . 'Contact' => $this->contact,
            ]);
        }
    }
}
