<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem\Price;

use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Generator;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class AllowanceCharge
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem\Price
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-Price/cac-AllowanceCharge/
 */
class AllowanceCharge implements XmlSerializable
{
    /**
     * @var double
     */
    private $amount;

    /**
     * @var double
     */
    private $baseAmount;

    /**
     * Discount amount
     * Discount amount connected to the price
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Discount amount
     * @param double $amount Discount amount connected to the price
     * @example 200
     * @return self
     * @mandatory
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Item list price
     * The gross price of the item before subtracting discounts. E.g. list price
     * @return double
     */
    public function getBaseAmount()
    {
        return $this->baseAmount;
    }

    /**
     * Item list price
     * @param double $baseAmount The gross price of the item before subtracting discounts. E.g. list price
     * @return self
     * @optional
     */
    public function setBaseAmount($baseAmount)
    {
        $this->baseAmount = $baseAmount;
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
        if (empty($this->amount)) {
            throw new \InvalidArgumentException("Element cbc:Amount MUST be provided");
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

        // Element 'cbc:ChargeIndicator' MUST contain value 'false'.
        $writer->write([
            Schema::CBC . 'ChargeIndicator' => 'false',
        ]);

        $writer->write([
            [
                'name' => Schema::CBC . 'Amount',
                'value' => number_format($this->amount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ],
        ]);

        if ($this->baseAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'BaseAmount',
                    'value' => number_format($this->baseAmount, 2, '.', ''),
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }
    }
}
