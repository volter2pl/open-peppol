<?php

namespace Volter\OpenPeppol\Order;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Generator;

/**
 * Class AnticipatedMonetaryTotal
 * @package Volter\OpenPeppol\Order
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AnticipatedMonetaryTotal/
 */
class AnticipatedMonetaryTotal implements XmlSerializable
{
    /**
     * @var float
     */
    private $lineExtensionAmount;

    /**
     * @var float
     */
    private $taxExclusiveAmount;

    /**
     * @var float
     */
    private $taxInclusiveAmount;

    /**
     * @var float
     */
    private $allowanceTotalAmount;

    /**
     * @var float
     */
    private $chargeTotalAmount;

    /**
     * @var float
     */
    private $prepaidAmount;

    /**
     * @var float
     */
    private $payableRoundingAmount;

    /**
     * @var float
     */
    private $payableAmount;

    /**
     * Sum of line amounts
     * Sum of line amounts in the document.The total of Line Extension Amounts net of tax and settlement discounts.
     * Must be rounded to maximum 2 decimals.
     * @return float
     */
    public function getLineExtensionAmount()
    {
        return $this->lineExtensionAmount;
    }

    /**
     * Sum of line amounts
     * @param float $lineExtensionAmount
     * Sum of line amounts in the document.The total of Line Extension Amounts net of tax and settlement discounts.<br>
     * Must be rounded to maximum 2 decimals.
     * @example 200
     * @return self
     * @mandatory
     */
    public function setLineExtensionAmount($lineExtensionAmount)
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    /**
     * Document total without TAX
     * The "Sum of line amounts" plus "sum of allowances on document level" plus "sum of charges on document level".
     * Must be rounded to maximum 2 decimals.
     * @return float
     */
    public function getTaxExclusiveAmount()
    {
        return $this->taxExclusiveAmount;
    }

    /**
     * Document total without TAX
     * @param float $taxExclusiveAmount
     * The "Sum of line amounts" plus "sum of allowances on document level" plus "sum of charges on document level".<br>
     * Must be rounded to maximum 2 decimals.
     * @example 200
     * @return self
     * @optional
     */
    public function setTaxExclusiveAmount($taxExclusiveAmount)
    {
        $this->taxExclusiveAmount = $taxExclusiveAmount;
        return $this;
    }

    /**
     * Document total including TAX
     * The total value including TAX. Must be rounded to maximum 2 decimals.
     * @return float
     */
    public function getTaxInclusiveAmount()
    {
        return $this->taxInclusiveAmount;
    }

    /**
     * Document total including TAX
     * @param float $taxInclusiveAmount The total value including TAX. Must be rounded to maximum 2 decimals.
     * @example 200
     * @return self
     * @optional
     */
    public function setTaxInclusiveAmount($taxInclusiveAmount)
    {
        $this->taxInclusiveAmount = $taxInclusiveAmount;
        return $this;
    }

    /**
     * Sum of allowances on document level
     * Sum of all allowances on header level in the document. Allowances on line level are included in the line amount
     * and summed up into the "sum of line amounts". Must be rounded to maximum 2 decimals.
     * @return float
     */
    public function getAllowanceTotalAmount()
    {
        return $this->allowanceTotalAmount;
    }

    /**
     * Sum of allowances on document level
     * @param float $allowanceTotalAmount
     * Sum of all allowances on header level in the document. Allowances on line level are included<br>
     * in the line amount and summed up into the "sum of line amounts". Must be rounded to maximum 2 decimals.
     * @example 200
     * @return self
     * @optional
     */
    public function setAllowanceTotalAmount($allowanceTotalAmount)
    {
        $this->allowanceTotalAmount = $allowanceTotalAmount;
        return $this;
    }

    /**
     * Sum of charges on document level
     * Sum of all charge on header level in the document. Charges on line level are included in the line amount<br>
     * and summed up into the "sum of line amounts". Must be rounded to maximum 2 decimals.
     * @return float
     */
    public function getChargeTotalAmount()
    {
        return $this->chargeTotalAmount;
    }

    /**
     * Sum of charges on document level
     * @param float $chargeTotalAmount
     * Sum of all charge on header level in the document. Charges on line level are included in the line amount<br>
     * and summed up into the "sum of line amounts". Must be rounded to maximum 2 decimals.
     * @example 200
     * @return self
     * @optional
     */
    public function setChargeTotalAmount($chargeTotalAmount)
    {
        $this->chargeTotalAmount = $chargeTotalAmount;
        return $this;
    }

    /**
     * Prepaid amounts
     * Any amounts that have been paid a-priory. Must be rounded to maximum 2 decimals.
     * @return float
     */
    public function getPrepaidAmount()
    {
        return $this->prepaidAmount;
    }

    /**
     * Prepaid amounts
     * @param float $prepaidAmount Any amounts that have been paid a-priory. Must be rounded to maximum 2 decimals.
     * @example 200
     * @return self
     * @optional
     */
    public function setPrepaidAmount($prepaidAmount)
    {
        $this->prepaidAmount = $prepaidAmount;
        return $this;
    }

    /**
     * Rounding of document total
     * The amount to be added to the total to round the amount to be paid. Must be rounded to maximum 2 decimals.
     * @return float
     */
    public function getPayableRoundingAmount()
    {
        return $this->payableRoundingAmount;
    }

    /**
     * Rounding of document total
     * @param float $payableRoundingAmount
     * The amount to be added to the total to round the amount to be paid. Must be rounded to maximum 2 decimals.
     * @example 200
     * @return self
     * @optional
     */
    public function setPayableRoundingAmount($payableRoundingAmount)
    {
        $this->payableRoundingAmount = $payableRoundingAmount;
        return $this;
    }

    /**
     * Payable amount
     * The amount that is expected to be paid. Must be rounded to maximum 2 decimals.
     * @return float
     */
    public function getPayableAmount()
    {
        return $this->payableAmount;
    }

    /**
     * Payable amount
     * @param float $payableAmount
     * The amount that is expected to be paid. Must be rounded to maximum 2 decimals.
     * @example 200
     * @return self
     * @mandatory
     */
    public function setPayableAmount($payableAmount)
    {
        $this->payableAmount = $payableAmount;
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
        if ($this->lineExtensionAmount === null) {
            throw new \InvalidArgumentException("Element 'cbc:LineExtensionAmount' MUST be provided.");
        }

        if ($this->payableAmount === null) {
            throw new \InvalidArgumentException("Element 'cbc:PayableAmount' MUST be provided");
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

        $writer->write([
            [
                'name' => Schema::CBC . 'LineExtensionAmount',
                'value' => number_format($this->lineExtensionAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ]
        ]);

        if ($this->taxExclusiveAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'TaxExclusiveAmount',
                    'value' => number_format($this->taxExclusiveAmount, 2, '.', ''),
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }

        if ($this->taxInclusiveAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'TaxInclusiveAmount',
                    'value' => number_format($this->taxInclusiveAmount, 2, '.', ''),
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }

        if ($this->allowanceTotalAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'AllowanceTotalAmount',
                    'value' => number_format($this->allowanceTotalAmount, 2, '.', ''),
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }

        if ($this->chargeTotalAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'ChargeTotalAmount',
                    'value' => number_format($this->chargeTotalAmount, 2, '.', ''),
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }

        if ($this->prepaidAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'PrepaidAmount',
                    'value' => number_format($this->prepaidAmount, 2, '.', ''),
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }

        if ($this->payableRoundingAmount !== null) {
            $writer->write([
                [
                    'name' => Schema::CBC . 'PayableRoundingAmount',
                    'value' => number_format($this->payableRoundingAmount, 2, '.', ''),
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }

        $writer->write([
            [
                'name' => Schema::CBC . 'PayableAmount',
                'value' => number_format($this->payableAmount, 2, '.', ''),
                'attributes' => [
                    'currencyID' => Generator::$currencyID
                ]
            ]
        ]);
    }
}
