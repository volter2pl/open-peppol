<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem;

use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Dict\UNCL5189;
use Volter\OpenPeppol\Dict\UNCL7161;
use Volter\OpenPeppol\Generator;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class AllowanceCharge
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-AllowanceCharge/
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
     * true = Charge, false = Allowance
     * @example false
     * @return self
     * @mandatory
     */
    public function setChargeIndicator($chargeIndicator)
    {
        $this->chargeIndicator = $chargeIndicator;
        return $this;
    }

    /**
     * Line level allowance or charge reason code
     * The reason for the line level allowance or charge, expressed as a code.
     * For allowances a subset of codelist UNCL5189 is to be used, and for charges
     * codelist UNCL7161 applies. The Document level allowance reason code and the
     * Document level allowance reason shall indicate the same allowance reason
     * @return string
     */
    public function getAllowanceChargeReasonCode()
    {
        return $this->allowanceChargeReasonCode;
    }

    /**
     * Line level allowance or charge reason code
     * @param int $allowanceChargeReasonCode
     * The reason for the line level allowance or charge, expressed as a code.<br>
     * For allowances a subset of codelist UNCL5189 is to be used, and for charges<br>
     * codelist UNCL7161 applies. The Document level allowance reason code and the<br>
     * Document level allowance reason shall indicate the same allowance reason
     * @see UNCL5189
     * @see UNCL7161
     * @return self
     * @optional
     */
    public function setAllowanceChargeReasonCode($allowanceChargeReasonCode)
    {
        $this->allowanceChargeReasonCode = $allowanceChargeReasonCode;
        return $this;
    }

    /**
     * Line level allowance or charge reason
     * The reason for the line level allowance or charge, expressed as text. The Document level allowance
     * reason code and the Document level allowance reason shall indicate the same allowance reason
     * @return string
     */
    public function getAllowanceChargeReason()
    {
        return $this->allowanceChargeReason;
    }

    /**
     * Line level allowance or charge reason
     * @param string $allowanceChargeReason
     * The reason for the line level allowance or charge, expressed as text. The Document level allowance<br>
     * reason code and the Document level allowance reason shall indicate the same allowance reason
     * @example "Discount"
     * @return self
     * @optional
     */
    public function setAllowanceChargeReason($allowanceChargeReason)
    {
        $this->allowanceChargeReason = $allowanceChargeReason;
        return $this;
    }

    /**
     * Line level allowance or charge percentage
     * The percentage that may be used, in conjunction with the line level allowance base amount,
     * to calculate the line level allowance or charge amount.
     * @return int
     */
    public function getMultiplierFactorNumeric()
    {
        return $this->multiplierFactorNumeric;
    }

    /**
     * Line level allowance or charge percentage
     * @param int $multiplierFactorNumeric
     * The percentage that may be used, in conjunction with the line level allowance base amount,<br>
     * to calculate the line level allowance or charge amount.
     * @example 20
     * @return self
     * @optional
     */
    public function setMultiplierFactorNumeric($multiplierFactorNumeric)
    {
        $this->multiplierFactorNumeric = $multiplierFactorNumeric;
        return $this;
    }

    /**
     * Line level allowance or charge amount
     * The amount of an allowance or a charge, without TAX. Must be rounded to maximum 2 decimals
     * @return double
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Line level allowance or charge amount
     * @param double $amount
     * The amount of an allowance or a charge, without TAX. Must be rounded to maximum 2 decimals
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
     * Line level allowance or charge base amount
     * The base amount that may be used, in conjunction with the line level allowance or charge percentage,
     * to calculate the line level allowance or charge amount. Must be rounded to maximum 2 decimals
     * @return double
     */
    public function getBaseAmount()
    {
        return $this->baseAmount;
    }

    /**
     * Line level allowance or charge base amount
     * @param double $baseAmount
     * The base amount that may be used, in conjunction with the line level allowance or charge percentage,<br>
     * to calculate the line level allowance or charge amount. Must be rounded to maximum 2 decimals
     * @example 1000
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

        if ($this->allowanceChargeReason !== null) {
            $writer->write([
                Schema::CBC . 'AllowanceChargeReason' => $this->allowanceChargeReason
            ]);
        }

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
    }
}
