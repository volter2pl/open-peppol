<?php

namespace Volter\OpenPeppol\Order\OrderLine;

use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Order\OrderLine\LineItem\LineItem;

/**
 * Class OrderLine
 * @package Volter\OpenPeppol\Order\OrderLine
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/
 */
class OrderLine implements XmlSerializable
{
    /**
     * @var string
     */
    private $note;

    /**
     * @var LineItem
     */
    private $lineItem;

    /**
     * Order line note
     * Free-form text applying to the Order Line. This element may contain notes or any other
     * similar information that is not contained explicitly in another structure. Is to capture
     * any free form description related to the order line as a whole.
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Order line note
     * @param string|null $note
     * Free-form text applying to the Order Line. This element may contain notes or any other<br>
     * similar information that is not contained explicitly in another structure. Is to capture<br>
     * any free form description related to the order line as a whole.
     * @return self
     * @optional
     */
    public function setNote($note = null)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Line item
     * Description of line item
     * @return LineItem
     */
    public function getLineItems()
    {
        return $this->lineItem;
    }

    /**
     * Line item
     * @param LineItem $lineItem Description of line item
     * @return self
     * @mandatory
     */
    public function setLineItems(LineItem $lineItem)
    {
        $this->lineItem = $lineItem;
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
        if (empty($this->lineItem)) {
            throw new \InvalidArgumentException("Element cac:LineItem MUST be provided");
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     * @throws \InvalidArgumentException
     */
    public function xmlSerialize(Writer $writer)
    {
        $this->validate();

        if ($this->note !== null) {
            $writer->write([
                Schema::CBC . 'Note' => $this->note,
            ]);
        }

        $writer->write([
            Schema::CAC . 'LineItem' => $this->lineItem,
        ]);
    }
}
