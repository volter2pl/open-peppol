<?php

namespace Volter\OpenPeppol\Order\OrderLine\LineItem;

use Volter\OpenPeppol\Generator;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Dict\UnitCode;
use Volter\OpenPeppol\Order\Common\RequestedDeliveryPeriod;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Item\Item;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Price\Price;

/**
 * Class LineItem
 * @package Volter\OpenPeppol\Order\OrderLine\LineItem
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/
 */
class LineItem implements XmlSerializable
{
    /**
     * @var string
     */
    private $ID;

    /**
     * @var double
     */
    private $quantity;

    /**
     * @var string
     * @see UnitCode
     */
    private $unitCode;

    /**
     * @var double
     */
    private $lineExtensionAmount;

    /**
     * @var bool
     */
    private $partialDeliveryIndicator = true;

    /**
     * @var string
     */
    private $accountingCost;

    /**
     * @var RequestedDeliveryPeriod
     */
    private $requestedDeliveryPeriod;

    /**
     * @var OriginatorParty
     */
    private $originatorParty;

    /**
     * @var AllowanceCharge[]
     */
    private $allowanceCharges;

    /**
     * @var Price
     */
    private $price;

    /**
     * @var Item
     */
    private $item;

    /**
     * Line item identifier
     * Identifies the Line Item assigned by the buyer, the identifier must be unique within the order.
     * @return string
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Line item identifier
     * @param string $ID
     * Identifies the Line Item assigned by the buyer, the identifier must be unique within the order.
     * @example "1"
     * @return self
     * @mandatory
     */
    public function setID($ID)
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * Ordered quantity
     * The quantity of Items for the Line Item. The quantity for the order line.
     * @return float
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Ordered quantity
     * @param float $quantity
     * The quantity of Items for the Line Item. The quantity for the order line.
     * @param string $unitCode
     * Ordered quantity unit of measure - the unit of measure that applies to the ordered quantity.
     *
     * @example 10, "KGM"
     * @see UnitCode
     * @return self
     * @mandatory
     */
    public function setQuantity($quantity, $unitCode)
    {
        UnitCode::validate($unitCode);
        $this->quantity = $quantity;
        $this->unitCode = $unitCode;
        return $this;
    }

    /**
     * Order line amount
     * The total amount for the Line Item, including Allowance Charges but net of taxes.
     * The expected line amount excluding TAX but inclusive of other charges, allowances and taxes.
     * @return float
     */
    public function getLineExtensionAmount()
    {
        return $this->lineExtensionAmount;
    }

    /**
     * Order line amount
     * @param float $lineExtensionAmount
     * The total amount for the Line Item, including Allowance Charges but net of taxes.<br>
     * The expected line amount excluding TAX but inclusive of other charges, allowances and taxes.
     * @example 200
     * @return self
     * @optional
     */
    public function setLineExtensionAmount($lineExtensionAmount)
    {
        $this->lineExtensionAmount = $lineExtensionAmount;
        return $this;
    }

    /**
     * Partial delivery indicator
     * Indicates if the line items must be delivered in a single shipment.
     * Default is that partial delivery is allowed (true)
     * @return bool
     */
    public function getPartialDeliveryIndicator()
    {
        return $this->partialDeliveryIndicator;
    }

    /**
     * Partial delivery indicator
     * @param bool $partialDeliveryIndicator
     * Indicates if the line items must be delivered in a single shipment.<br>
     * Default is that partial delivery is allowed (true)
     * @example true
     * @return self
     * @optional
     */
    public function setPartialDeliveryIndicator($partialDeliveryIndicator = true)
    {
        $this->partialDeliveryIndicator = $partialDeliveryIndicator;
        return $this;
    }


    /**
     * Buyers accounting string
     * The buyer's accounting information applied to the Line Item, expressed as text.
     * @return string
     */
    public function getAccountingCost()
    {
        return $this->accountingCost;
    }

    /**
     * Buyers accounting string
     * @param string $accountingCost The buyer's accounting information applied to the Line Item, expressed as text.
     * @return self
     * @optional
     */
    public function setAccountingCost($accountingCost)
    {
        $this->accountingCost = $accountingCost;
        return $this;
    }

    /**
     * Order line requested delivery period
     * Requested delivery period for the order line
     * @return RequestedDeliveryPeriod
     */
    public function getDelivery()
    {
        return $this->requestedDeliveryPeriod;
    }

    /**
     * Order line requested delivery period
     * @param RequestedDeliveryPeriod $requestedDeliveryPeriod Requested delivery period for the order line
     * @return self
     * @optional
     */
    public function setDelivery(RequestedDeliveryPeriod $requestedDeliveryPeriod)
    {
        $this->requestedDeliveryPeriod = $requestedDeliveryPeriod;
        return $this;
    }

    /**
     * Originator information
     * Information regarding the originator of the order line
     * @return OriginatorParty
     */
    public function getOriginatorParty()
    {
        return $this->originatorParty;
    }

    /**
     * Originator information
     * @param OriginatorParty $originatorParty Information regarding the originator of the order line
     * @return self
     * @optional
     */
    public function setOriginatorParty($originatorParty)
    {
        $this->originatorParty = $originatorParty;
        return $this;
    }

    /**
     * Order line allowance and charges
     * A group of business terms providing information about allowances
     * or charges applicable to the individual order line.
     * @return AllowanceCharge[]
     */
    public function getAllowanceCharges()
    {
        return $this->allowanceCharges;
    }

    /**
     * Order line allowance and charges
     * @param AllowanceCharge[] $allowanceCharges
     * A group of business terms providing information about allowances<br>
     * or charges applicable to the individual order line.
     * @return self
     * @optional
     */
    public function setAllowanceCharges($allowanceCharges)
    {
        $this->allowanceCharges = $allowanceCharges;
        return $this;
    }

    /**
     * Price information
     * @return Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Price information
     * @param Price $price Price information
     * @return self
     * @optional
     */
    public function setPrice(Price $price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Item information
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * Item information
     * @param Item $item Item information
     * @return self
     * @mandatory
     */
    public function setItem(Item $item)
    {
        $this->item = $item;
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
        if (empty($this->ID)) {
            throw new \InvalidArgumentException("Element 'cbc:ID' MUST be provided");
        }

        if (empty($this->quantity)) {
            throw new \InvalidArgumentException("Element 'cbc:Quantity' MUST be provided");
        }

        UnitCode::validate($this->unitCode);

        if (empty($this->item)) {
            throw new \InvalidArgumentException("Element 'cac:Item' MUST be provided");
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

        $writer->write([
            Schema::CBC . 'ID' => $this->ID
        ]);

        $writer->write([
            Schema::CBC . 'Quantity' => [
                'value' => number_format($this->quantity, 10, '.', ''),
                'attributes' => [
                    'unitCode' => $this->unitCode
                ]
            ]
        ]);

        if ($this->lineExtensionAmount !== null) {
            $writer->write([
                Schema::CBC . 'LineExtensionAmount' => [
                    'value' => number_format($this->lineExtensionAmount, 2, '.', ''),
                    'attributes' => [
                        'currencyID' => Generator::$currencyID
                    ]
                ]
            ]);
        }

        if ($this->partialDeliveryIndicator !== null) {
            $writer->write([
                Schema::CBC . 'PartialDeliveryIndicator' => $this->partialDeliveryIndicator ? 'true' : 'false'
            ]);
        }

        if ($this->accountingCost !== null) {
            $writer->write([
                Schema::CBC . 'AccountingCost' => $this->accountingCost
            ]);
        }

        if ($this->requestedDeliveryPeriod !== null) {
            $writer->write([
                Schema::CAC . 'Delivery' => [Schema::CAC . 'RequestedDeliveryPeriod' => $this->requestedDeliveryPeriod]
            ]);
        }

        if ($this->originatorParty !== null) {
            $writer->write([
                Schema::CAC . 'OriginatorParty' => $this->originatorParty
            ]);
        }

        if (!empty($this->allowanceCharges)) {
            foreach ($this->allowanceCharges as $allowanceCharge) {
                $writer->write([
                    Schema::CAC . 'AllowanceCharge' => $allowanceCharge
                ]);
            }
        }

        if ($this->price !== null) {
            $writer->write([
                Schema::CAC . 'Price' => $this->price
            ]);
        }

        $writer->write([
            Schema::CAC . 'Item' => $this->item
        ]);
    }
}
