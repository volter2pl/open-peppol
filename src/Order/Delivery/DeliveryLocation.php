<?php

namespace Volter\OpenPeppol\Order\Delivery;

use Volter\OpenPeppol\Dict\ISO6523ICD;
use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Order\Common\Address;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class DeliveryLocation
 * @package Volter\OpenPeppol\Order\Delivery
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-Delivery/cac-DeliveryLocation/
 */
class DeliveryLocation implements XmlSerializable
{
    /**
     * @var string
     */
    private $ID;

    /**
     * @var string
     */
    private $schemeID;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Address
     */
    private $address;

    /**
     * Delivery location ID
     * An identifer for the location to where the ordered items should be delivered
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Delivery location ID
     * @param string|null $ID
     * An identifer for the location to where the ordered items should be delivered
     * @param string|null $schemeID
     * Deliver to location identifier identification scheme identifier<br>
     * The identification scheme identifier of the Deliver to location identifier
     * @example "7300010000001", "0088"
     * @return self
     * @optional
     */
    public function setID($ID = null, $schemeID = null)
    {
        ISO6523ICD::verify($schemeID);
        $this->ID = $ID;
        $this->schemeID = $schemeID;
        return $this;
    }

    /**
     * Delivery location name
     * A name of the location to where the ordered items should be delivered
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Delivery location name
     * @param string|null $name
     * A name of the location to where the ordered items should be delivered
     * @example "South side goods arrival dock"
     * @return self
     * @optional
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Delivery address
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Delivery address
     * @param Address $address
     * @return self
     * @mandatory
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
        if (!empty($this->schemeID)) {
            ISO6523ICD::verify($this->schemeID);
        }

        if ($this->address === null) {
            throw new \InvalidArgumentException("Element 'cac:Address' MUST be provided");
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

        if ($this->ID !== null) {
            $attributes = [];
            if ($this->schemeID !== null) {
                $attributes['schemeID'] = $this->schemeID;
            }

            $writer->write([
                [
                    'name' => Schema::CBC . 'ID',
                    'value' => $this->ID,
                    'attributes' => $attributes
                ]
            ]);
        }

        if ($this->name !== null) {
            $writer->write([
                Schema::CBC . 'Name' => $this->name
            ]);
        }

        $writer->write([
            Schema::CAC . 'Address' => $this->address,
        ]);
    }
}
