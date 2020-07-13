<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem;

use Volter\OpenPeppol\Dict\ISO6523ICD;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Dict\Schema;

/**
 * Class OriginatorParty
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-OriginatorParty/
 */
class OriginatorParty implements XmlSerializable
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
     * Order line originator party ID
     * The party who originated Order
     * @return string
     */
    public function getOriginatorPartyID()
    {
        return $this->ID;
    }

    /**
     * Order line originator party ID
     * @param string|null $ID The party who originated Order
     * @param string|null $schemeID Scheme identifier for party identification
     * @example "7300010000001", "0088"
     * @see ISO6523ICD
     * @return self
     * @optional
     */
    public function setOriginatorParty($ID = null, $schemeID = null)
    {
        if ($schemeID !== null) {
            ISO6523ICD::verify($schemeID);
        }

        $this->ID = $ID;
        $this->schemeID = $schemeID;
        return $this;
    }

    /**
     * Order line originator party name
     * The party who originated Order.
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Order line originator party name
     * @param string|null $name The party who originated Order.
     * @example "Originator name"
     * @return self
     * @optional
     */
    public function setName($name = null)
    {
        $this->name = $name;
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
        if ($this->schemeID !== null) {
            ISO6523ICD::verify($this->schemeID);
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    function xmlSerialize(Writer $writer)
    {
        $this->validate();

        if ($this->ID !== null) {

            $attributes = [];
            if ($this->schemeID !== null) {
                $attributes['schemeID'] = $this->schemeID;
            }

            $writer->write([
                Schema::CAC . 'PartyIdentification' => [
                    [
                        'name' => Schema::CBC . 'ID',
                        'value' => $this->ID,
                        'attributes' => $attributes
                    ]
                ]
            ]);
        }

        if ($this->name !== null) {
            $writer->write([
                Schema::CAC . 'PartyName' => [Schema::CBC . 'Name' => $this->name]
            ]);
        }
    }
}
