<?php

namespace Volter\OpenPeppol\Order\Party;

use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class Contact
 * @package Volter\OpenPeppol\Order\Party
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-BuyerCustomerParty/cac-Party/cac-Contact/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-SellerSupplierParty/cac-Party/cac-Contact/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OriginatorCustomerParty/cac-Party/cac-Contact/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AccountingCustomerParty/cac-Party/cac-Contact/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-Delivery/cac-DeliveryParty/cac-Contact/
 */
class Contact implements XmlSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $electronicMail;

    /**
     * Contact person name
     * The name of the contact person.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Contact person name
     * @param string $name The name of the contact person
     * @return self
     * @optional
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Contact telephone number
     * A phone number for the contact person. If the person has a direct number, this is that number.
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Contact telephone number
     * @param string $telephone
     * A phone number for the contact person. If the person has a direct number, this is that number.
     * @return self
     * @optional
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * Contact email address
     * The e-mail address for the contact person. If the person has a direct e-mail this is that email.
     * @return string
     */
    public function getElectronicMail()
    {
        return $this->electronicMail;
    }

    /**
     * Contact email address
     * @param string $electronicMail
     * The e-mail address for the contact person. If the person has a direct e-mail this is that email.
     * @return self
     * @optional
     */
    public function setElectronicMail($electronicMail)
    {
        $this->electronicMail = $electronicMail;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        if ($this->name !== null) {
            $writer->write([
                Schema::CBC . 'Name' => $this->name
            ]);
        }

        if ($this->telephone !== null) {
            $writer->write([
                Schema::CBC . 'Telephone' => $this->telephone
            ]);
        }

        if ($this->electronicMail !== null) {
            $writer->write([
                Schema::CBC . 'ElectronicMail' => $this->electronicMail
            ]);
        }
    }
}
