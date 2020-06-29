<?php

namespace Volter\OpenPeppol\Order;

use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class DeliveryTerms
 * @package Volter\OpenPeppol\Order
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-DeliveryTerms/
 */
class DeliveryTerms implements XmlSerializable
{
    /**
     * @var string
     */
    private $ID;

    /**
     * @var string
     */
    private $specialTerms;

    /**
     * @var string
     */
    private $deliveryLocation;

    /**
     * Delivery terms identifier
     * Delivery terms identifier, normally Incoterms
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Delivery terms identifier
     * @param string $ID Delivery terms identifier, normally Incoterms
     * @example "FOB"
     * @return self
     * @optional
     */
    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * Delivery special terms
     * A description of special conditions relating to the Delivery Terms
     * @return string
     */
    public function getSpecialTerms()
    {
        return $this->specialTerms;
    }

    /**
     * Delivery special terms
     * @param string $specialTerms A description of special conditions relating to the Delivery Terms
     * @return self
     * @optional
     */
    public function setSpecialTerms($specialTerms)
    {
        $this->specialTerms = $specialTerms;
        return $this;
    }

    /**
     * Delivery terms location
     * The location to which the delivery terms refer. Used to qualify
     * the delivery terms e.g. "Terms of delivery are FOB Rotterdam"
     * @return string
     */
    public function getDeliveryLocation()
    {
        return $this->deliveryLocation;
    }

    /**
     * Delivery terms location
     * @param string $deliveryLocation
     * The location to which the delivery terms refer. Used to qualify
     * the delivery terms e.g. "Terms of delivery are FOB Rotterdam"
     * @example "Rotterdam"
     * @return self
     * @optional
     */
    public function setDeliveryLocation($deliveryLocation)
    {
        $this->deliveryLocation = $deliveryLocation;
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
        if ($this->ID !== null) {
            $writer->write([
                Schema::CBC . 'ID' => $this->ID
            ]);
        }

        if ($this->specialTerms !== null) {
            $writer->write([
                Schema::CBC . 'SpecialTerms' => $this->specialTerms
            ]);
        }

        if ($this->deliveryLocation !== null) {
            $writer->write([
                Schema::CAC . 'DeliveryLocation' => [Schema::CBC . 'ID' => $this->deliveryLocation]
            ]);
        }
    }
}
