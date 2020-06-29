<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem\Item;

use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class CommodityClassification
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem\Item
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-Item/cac-CommodityClassification/
 */
class CommodityClassification implements XmlSerializable
{
    /**
     * @var string
     */
    private $itemClassificationCode;

    /**
     * @var string
     */
    private $listID;

    /**
     * @var string
     */
    private $listVersionID;

    /**
     * @var string
     */
    private $name;

    /**
     * Item classification code
     * A code for classifying the item by its type or nature. Classification codes are used to allow grouping
     * of similar items for a various purposes e.g. public procurement (CPV), e-Commerce (UNSPSC) etc
     * @return string
     */
    public function getItemClassificationCode()
    {
        return $this->itemClassificationCode;
    }

    /**
     * Item classification code
     * @param string $itemClassificationCode Commodity classification information
     * A code for classifying the item by its type or nature. Classification codes are used to allow grouping<br>
     * of similar items for a various purposes e.g. public procurement (CPV), e-Commerce (UNSPSC) etc
     * @param string $listID
     * Item classification identifier identification scheme identifier<br>
     * The identification scheme identifier of the Item classification identifier
     * @param string|null $listVersionID
     * Item classification identifier version identification scheme identifier<br>
     * The identification scheme version identifier of the Item classification identifier
     * @param string|null $name
     * Clear text name equivalent of classification code<br>
     * The textual equivalent of the code value
     *
     * @return self
     * @example "9873242", "STI", "20.0602", "Office furniture"
     * @optional
     */
    public function setItemClassificationCode($itemClassificationCode, $listID, $listVersionID = null, $name = null)
    {
        $this->itemClassificationCode = $itemClassificationCode;
        $this->listID = $listID;
        $this->listVersionID = $listVersionID;
        $this->name = $name;
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
        if ($this->itemClassificationCode !== null) {

            $attributes['listID'] = $this->listID;

            if ($this->listVersionID !== null) {
                $attributes['listVersionID'] = $this->listVersionID;
            }

            if ($this->name !== null) {
                $attributes['name'] = $this->name;
            }

            $writer->write([
                [
                    'name' => Schema::CBC . 'ItemClassificationCode',
                    'value' => $this->itemClassificationCode,
                    'attributes' => $attributes
                ]
            ]);
        }
    }
}
