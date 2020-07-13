<?php

namespace Volter\OpenPeppol\Order;

use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Dict\UNCL5189;
use Volter\OpenPeppol\Dict\UNCL7161;
use Volter\OpenPeppol\Generator;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class AllowanceCharge
 * @package Volter\OpenPeppol\Order
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AllowanceCharge/
 * @link https://docs.peppol.eu/poacc/upgrade-3/profiles/28-ordering/#_allowances_and_charges
 */
class AllowanceCharge implements XmlSerializable
{
    /**
     * @var bool
     */
    private $chargeIndicator;

    /**
     * @var string
     */
    private $allowanceChargeReasonCode;

    /**
     * @var string
     */
    private $allowanceChargeReason;

    /**
     * @var int
     */
    private $multiplierFactorNumeric;

    /**
     * @var double
     */
    private $amount;

    /**
     * @var double
     */
    private $baseAmount;

    /**
     * @var TaxCategory
     */
    private $taxCategory;

    /**
     * AllowanceChargeIndicator
     * Indicator used to state if the following is an allowance or charge.
     * true = Charge, false = Allowance
     * @return bool
     */
    public function isChargeIndicator()
    {
        return $this->chargeIndicator;
    }

    /**
     * AllowanceChargeIndicator
     * @param bool $chargeIndicator
     * Indicator used to state if the following is an allowance or charge.<br>
     * <b>true = Charge,</b><br>
     * <b>false = Allowance</b>
     * @example true
     * @return self
     * @mandatory
     *
     */
    public function setChargeIndicator($chargeIndicator)
    {
        $this->chargeIndicator = $chargeIndicator;
        return $this;
    }

    /**
     * Document level allowance or charge reason code
     * The reason for the document level allowance or charge, expressed as a code. For allowances a subset
     * of codelist UNCL5189 is to be used, and for charges codelist UNCL7161 applies. The Document level allowance
     * reason code and the Document level allowance reason shall indicate the same allowance reason
     * @return string
     */
    public function getAllowanceChargeReasonCode()
    {
        return $this->allowanceChargeReasonCode;
    }

    /**
     * Document level allowance or charge reason code
     * @param string|null $allowanceChargeReasonCode
     * <b>charge = UNCL7161</b><br>
     * <b>allowances = UNCL5189</b><br>
     * The reason for the document level allowance or charge, expressed as a code. For allowances a subset<br>
     * of codelist UNCL5189 is to be used, and for charges codelist UNCL7161 applies. The Document level allowance<br>
     * reason code and the Document level allowance reason shall indicate the same allowance reason
     * @see UNCL5189
     * @see UNCL7161
     * @return self
     * @optional
     */
    public function setAllowanceChargeReasonCode($allowanceChargeReasonCode = null)
    {
        $this->allowanceChargeReasonCode = $allowanceChargeReasonCode;
        return $this;
    }

    /**
     * Allowance and charges reason
     * A textual reason for the allowance or the charge. Can also be its name. The Document level allowance
     * reason code and the Document level allowance reason shall indicate the same allowance reason
     * @return string
     */
    public function getAllowanceChargeReason()
    {
        return $this->allowanceChargeReason;
    }

    /**
     * Allowance and charges reason
     * @param string $allowanceChargeReason
     * A textual reason for the allowance or the charge. Can also be its name. The Document level allowance<br>
     * reason code and the Document level allowance reason shall indicate the same allowance reason
     * @return self
     * @mandatory
     */
    public function setAllowanceChargeReason($allowanceChargeReason)
    {
        $this->allowanceChargeReason = $allowanceChargeReason;
        return $this;
    }

    /**
     * Document level allowance or charge percentage
     * The percentage that may be used, in conjunction with the document level allowance base amount,
     * to calculate the document level allowance or charge amount. To state 20%, use value 20.
     * @return int
     */
    public function getMultiplierFactorNumeric()
    {
        return $this->multiplierFactorNumeric;
    }

    /**
     * Document level allowance or charge percentage
     * @param int|null $multiplierFactorNumeric
     * The percentage that may be used, in conjunction with the document level allowance base amount,<br>
     * to calculate the document level allowance or charge amount. To state 20%, use value 20.
     * @example 20
     * @return self
     * @optional
     */
    public function setMultiplierFactorNumeric($multiplierFactorNumeric = null)
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;
        return $this;
    }

    /**
     * Allowance and charge amount
     * The net amount of the allowance or the charge exluding TAX.
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Allowance and charge amount
     * @param double $amount The net amount of the allowance or the charge exluding TAX.
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
     * Document level allowance or charge base amount
     * The base amount that may be used, in conjunction with the document level allowance or charge percentage,
     * to calculate the document level allowance or charge amount. Must be rounded to maximum 2 decimals
     * @return double
     */
    public function getBaseAmount()
    {
        return $this->baseAmount;
    }

    /**
     * Document level allowance or charge base amount
     * @param double|null $baseAmount
     * The base amount that may be used, in conjunction with the document level allowance or charge percentage,<br>
     * to calculate the document level allowance or charge amount. Must be rounded to maximum 2 decimals
     * @return self
     * @optional
     */
    public function setBaseAmount($baseAmount = null)
    {
        $this->baseAmount = $baseAmount;
        return $this;
    }

    /**
     * @return TaxCategory
     */
    public function getTaxCategory()
    {
        return $this->taxCategory;
    }

    /**
     * @param TaxCategory|null $taxCategory
     * @return self
     * @optional
     */
    public function setTaxCategory(TaxCategory $taxCategory = null)
    {
        $this->taxCategory = $taxCategory;
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
        if ($this->allowanceChargeReasonCode !== null) {
            $this->chargeIndicator
                ? UNCL7161::verify($this->allowanceChargeReasonCode)
                : UNCL5189::verify($this->allowanceChargeReasonCode);
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
            Schema::CBC . 'ChargeIndicator' => $this->chargeIndicator ? 'true' : 'false',
        ]);

        if ($this->allowanceChargeReasonCode !== null) {
            $writer->write([
                Schema::CBC . 'AllowanceChargeReasonCode' => $this->allowanceChargeReasonCode
            ]);
        }

        $writer->write([
            Schema::CBC . 'AllowanceChargeReason' => $this->allowanceChargeReason
        ]);

        if ($this->multiplierFactorNumeric !== null) {
            $writer->write([
                Schema::CBC . 'MultiplierFactorNumeric' => $this->multiplierFactorNumeric
            ]);
        }

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

        if ($this->taxCategory !== null) {
            $writer->write([
                Schema::CAC . 'TaxCategory' => $this->taxCategory
            ]);
        }
    }
}
