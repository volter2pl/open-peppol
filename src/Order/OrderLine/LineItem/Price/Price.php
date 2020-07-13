<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem\Price;

use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Dict\UnitCode;
use Volter\OpenPeppol\Generator;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class Price
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem\Price
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-Price/
 */
class Price implements XmlSerializable
{
    /**
     * @var double
     */
    private $priceAmount;

    /**
     * @var double
     */
    private $baseQuantity = 1;

    /**
     * @var string
     */
    private $unitCode = UnitCode::UNIT;

    /**
     * @var AllowanceCharge
     */
    private $allowanceCharge;

    /**
     * Item price
     * The net price of the item including all allowances, charges and taxes but exluding TAX.
     * Although price is an optional element in an order it recommended as best practice to either state
     * the price or provide reference to an appropriate source from which the price can be identified
     * such as a contract, catalogue or a quote.
     * @return double
     */
    public function getPriceAmount()
    {
        return $this->priceAmount;
    }

    /**
     * Item price
     * @param double $priceAmount
     * The net price of the item including all allowances, charges and taxes but exluding TAX.<br>
     * Although price is an optional element in an order it recommended as best practice to either state<br>
     * the price or provide reference to an appropriate source from which the price can be identified<br>
     * such as a contract, catalogue or a quote.
     * @example 211.124
     * @return self
     * @mandatory
     */
    public function setPriceAmount($priceAmount)
    {
        $this->priceAmount = $priceAmount;
        return $this;
    }

    /**
     * Item price base quantity
     * The actual quantity to which the price applies.
     * @return double
     */
    public function getBaseQuantity()
    {
        return $this->baseQuantity;
    }

    /**
     * Item price base quantity
     * @param double|null $baseQuantity
     * The actual quantity to which the price applies
     * @param string|null $unitCode
     * Base quantity unit of measure - the unit of measure that applies to the base quantity
     *
     * @example 1, "C62"
     * @see UnitCode
     * @return self
     * @optional
     */
    public function setBaseQuantity($baseQuantity = 1.0, $unitCode = null)
    {
        if ($unitCode !== null) {
            UnitCode::verify($unitCode);
        }
        $this->baseQuantity = $baseQuantity;
        $this->unitCode = $unitCode;
        return $this;
    }

    /**
     * Price discount information
     * Information on discounts connected to the price
     * @return AllowanceCharge
     */
    public function getAllowanceCharge()
    {
        return $this->allowanceCharge;
    }

    /**
     * Price discount information
     * @param AllowanceCharge|null $allowanceCharge Information on discounts connected to the price
     * @return self
     * @optional
     */
    public function setAllowanceCharge(AllowanceCharge $allowanceCharge = null)
    {
        $this->allowanceCharge = $allowanceCharge;
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
        if (empty($this->priceAmount)) {
            throw new \InvalidArgumentException("Element 'cbc:PriceAmount' MUST be provided");
        }

        if (!empty($this->baseQuantity) && $this->baseQuantity <= 0) {
            throw new \InvalidArgumentException("Base quantity SHALL be a positive number above zero");
        }

        if ($this->unitCode !== null) {
            UnitCode::verify($this->unitCode);
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

        $writer->write([
            [
                'name' => Schema::CBC . 'PriceAmount',
                'value' => $this->priceAmount,
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ]
        ]);

        if ($this->baseQuantity !== null) {

            $attributes = [];
            if ($this->unitCode !== null) {
                $attributes['unitCode'] = $this->unitCode;
            }

            $writer->write([
                [
                    'name' => Schema::CBC . 'BaseQuantity',
                    'value' => $this->baseQuantity,
                    'attributes' => $attributes
                ]
            ]);
        }

        if ($this->allowanceCharge !== null) {
            $writer->write([Schema::CAC . 'AllowanceCharge' => $this->allowanceCharge]);
        }
    }
}
