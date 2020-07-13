<?php


namespace Volter\OpenPeppol\Order\OrderLine\LineItem\Item;

use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class ItemInstance
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem\Item
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-Item/cac-ItemInstance/
 */
class ItemInstance implements XmlSerializable
{
    /**
     * @var string
     */
    private $serialID;

    /**
     * @var string
     */
    private $lotIdentification;

    /**
     * Item serial identification
     * An identifier that is specific to the items in the order line
     * @return string
     */
    public function getSerialID()
    {
        return $this->serialID;
    }

    /**
     * Item serial identification
     * @param string|null $serialID An identifier that is specific to the items in the order line
     * @return self
     * @optional
     */
    public function setSerialID($serialID = null)
    {
        $this->serialID = $serialID;
        return $this;
    }

    /**
     * Item lot information
     * Information about the production lot which the order line items come from
     * @return string
     */
    public function getLotIdentification()
    {
        return $this->lotIdentification;
    }

    /**
     * Item lot information
     * Information about the production lot which the order line items come from
     * @param string|null $lotIdentificationID
     * Item lot identifier<br>
     * An identifier for the production lot which the order line items come from
     * @return self
     * @optional
     */
    public function setLotIdentification($lotIdentificationID = null)
    {
        $this->lotIdentification = $lotIdentificationID;
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
        if ($this->serialID !== null) {
            $writer->write([
                Schema::CBC . 'SerialID' => $this->serialID,
            ]);
        }

        if ($this->lotIdentification !== null) {
            $writer->write([
                Schema::CAC . 'LotIdentification' => [Schema::CBC . 'LotNumberID' => $this->lotIdentification],
            ]);
        }
    }
}
