<?php

namespace Volter\OpenPeppol\Order;

use Volter\OpenPeppol\Generator;
use Volter\OpenPeppol\Dict\ISO4217;
use Volter\OpenPeppol\Dict\OrderTypeCode;
use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Order\Delivery\Delivery;
use Volter\OpenPeppol\Order\OrderLine\OrderLine;
use Volter\OpenPeppol\Order\Party\Party;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class Order
 * @package Volter\OpenPeppol
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/
 */
class Order implements XmlSerializable
{
    const PROFILE_ID_ORDERING   = 'urn:fdc:peppol.eu:poacc:bis:ordering:3';
    const PROFILE_ID_ORDER_ONLY = 'urn:fdc:peppol.eu:poacc:bis:order_only:3';

    /**
     * @link https://docs.peppol.eu/poacc/upgrade-3/profiles/28-ordering/#prof-28
     */
    const CUSTOMIZATION_ID_ORDER = 'urn:fdc:peppol.eu:poacc:trns:order:3';
    const CUSTOMIZATION_ID_ORDER_RESPONSE = 'urn:fdc:peppol.eu:poacc:trns:order_response:3';

    /**
     * @var string
     */
    private $customizationID = self::CUSTOMIZATION_ID_ORDER;

    /**
     * @var string
     */
    private $profileID = self::PROFILE_ID_ORDER_ONLY;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $salesOrderId;

    /**
     * @var \DateTime
     */
    private $issueDate;

    /**
     * @var \DateTime
     */
    private $issueTime;

    /**
     * @var int
     */
    private $orderTypeCode = OrderTypeCode::ORDER;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $documentCurrencyCode = ISO4217::EUR;

    /**
     * @var string
     */
    private $customerReference;

    /**
     * @var string
     */
    private $accountingCost;

    /**
     * @var \DateTime
     */
    private $validityPeriodEndDate;

    /**
     * @var string
     */
    private $quotationDocumentReference;

    /**
     * @var string
     */
    private $orderDocumentReference;

    /**
     * @var string
     */
    private $originatorDocumentReference;

    /**
     * @var AdditionalDocumentReference[]
     */
    private $additionalDocumentReferences;

    /**
     * @var string
     */
    private $contract;

    /**
     * @var Party
     */
    private $buyerCustomerParty;

    /**
     * @var Party
     */
    private $sellerSupplierParty;

    /**
     * @var Party
     */
    private $originatorCustomerParty;

    /**
     * @var Party
     */
    private $accountingCustomerParty;

    /**
     * @var Delivery
     */
    private $delivery;

    /**
     * @var DeliveryTerms
     */
    private $deliveryTerms;

    /**
     * @var string
     */
    private $paymentTerms;

    /**
     * @var AllowanceCharge[]
     */
    private $allowanceCharges;

    /**
     * @var double
     */
    private $taxTotalAmount;

    /**
     * @var AnticipatedMonetaryTotal
     */
    private $anticipatedMonetaryTotal;

    /**
     * @var OrderLine[]
     */
    private $orderLines;

    /**
     * Specification identification
     * @example "urn:fdc:peppol.eu:poacc:trns:order:3"
     * @param string $id Identifies the specification of content and rules that apply to the transaction
     * @return self
     * @mandatory
     */
    public function setCustomizationID($id)
    {
        $this->customizationID = $id;
        return $this;
    }

    /**
     * Business process type identifier
     * Identifies the BII profile or business process context in which the transaction appears.
     * Values to be used are either urn:fdc:peppol.eu:poacc:bis:order_only:3 or urn:fdc:peppol.eu:poacc:bis:ordering:3
     * @return string
     */
    public function getProfileID()
    {
        return $this->profileID;
    }

    /**
     * Business process type identifier
     * @param string $profileID
     * Identifies the BII profile or business process context in which the transaction appears. Values to be used<br>
     * are either <b>urn:fdc:peppol.eu:poacc:bis:order_only:3</b> or <b>urn:fdc:peppol.eu:poacc:bis:ordering:3</b>
     * @example "urn:fdc:peppol.eu:poacc:bis:order_only:3"
     * @return self
     * @mandatory
     */
    public function setProfileID($profileID)
    {
        if (!in_array($profileID, [self::PROFILE_ID_ORDERING, self::PROFILE_ID_ORDER_ONLY])) {
            throw new \InvalidArgumentException(
                "Element cac:ProfileID MUST one of "
                . implode(', ', [self::PROFILE_ID_ORDERING, self::PROFILE_ID_ORDER_ONLY])
            );
        }

        $this->profileID = $profileID;
        return $this;
    }

    /**
     * Order identifier
     * A transaction instance must have an identifier. The identifier enables referencing the transaction
     * for various purposes such as from other transactions that are part of the same process.
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Order identifier
     * @param string $id
     * A transaction instance must have an identifier. The identifier enables referencing the transaction<br>
     * for various purposes such as from other transactions that are part of the same process.
     * @example "0-123"
     * @return self
     * @mandatory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Sales order reference
     * An identifier of a referenced sales order, issued by the Seller.
     * @return string
     */
    public function getSalesOrderID()
    {
        return $this->salesOrderId;
    }

    /**
     * Sales order reference
     * @param string|null $salesOrderId An identifier of a referenced sales order, issued by the Seller
     * @example "112233"
     * @return self
     * @optional
     */
    public function setSalesOrderID($salesOrderId = null)
    {
        $this->salesOrderId = $salesOrderId;
        return $this;
    }

    /**
     * Order issue date
     * The date on which the transaction instance was issued.
     * @return \DateTime
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * Order issue date
     * @param \DateTime $issueDate The date on which the transaction instance was issued
     * @return self
     * @mandatory
     */
    public function setIssueDate(\DateTime $issueDate)
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * Order issue time
     * The time assigned by the buyer on which the order was issued.
     * @return \DateTime
     */
    public function getIssueTime()
    {
        return $this->issueTime;
    }

    /**
     * Order issue time
     * @param \DateTime|null $issueTime The time assigned by the buyer on which the order was issued.
     * @return self
     * @optional
     */
    public function setIssueTime(\DateTime $issueTime = null)
    {
        $this->issueTime = $issueTime;
        return $this;
    }

    /**
     * Consignment order indication
     * Indicates wether the order is a purchase order or consignement order. Default is purchase order.
     * @return int
     */
    public function getOrderTypeCode()
    {
        return $this->orderTypeCode;
    }

    /**
     * Consignment order indication
     * @example 220
     * @param int $orderTypeCode Indicates wether the order is a purchase order or consignement order
     * @return self
     * @optional
     */
    public function setOrderTypeCode($orderTypeCode = OrderTypeCode::ORDER)
    {
        OrderTypeCode::verify($orderTypeCode);
        $this->orderTypeCode;
        return $this;
    }

    /**
     * Document level textual note
     * Free form text applying to the Order. This element may contain notes or any other similar information
     * that is not contained explicitly in another structure.
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Document level textual note
     * @param string|null $note
     * Free form text applying to the Order. This element may contain notes or any other<br>
     * similar information that is not contained explicitly in another structure.
     * @example "Packages of other sizes are OK"
     * @return self
     * @optional
     */
    public function setNote($note = null)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Currency
     * The default currency for the order.
     * @return string
     */
    public function getDocumentCurrencyCode()
    {
        return $this->documentCurrencyCode;
    }

    /**
     * Currency
     * @param string $currencyCode The default currency for the order
     * @example ISO4217::NOK
     * @return self
     * @mandatory
     */
    public function setDocumentCurrencyCode($currencyCode = ISO4217::EUR)
    {
        ISO4217::verify($currencyCode);
        $this->documentCurrencyCode = $currencyCode;
        return $this;
    }

    /**
     * Buyer contact
     * The element is used for the reference of who ordered the products/services. Example being the name of
     * the person ordering, employee number or a code identifying this person or department/group.
     * Also known as "Your reference", and should also be sent in the corresponding invoice.
     * @return string
     */
    public function getCustomerReference()
    {
        return $this->customerReference;
    }

    /**
     * Buyer contact
     * @param string|null $customerReference
     * The element is used for the reference of who ordered the products/services.<br>
     * Example being the name of the person ordering, employee number or a code<br>
     * identifying this person or department/group. Also known as "Your reference",<br>
     * and should also be sent in the corresponding invoice.
     * @example "oik987"
     * @return self
     * @optional
     */
    public function setCustomerReference($customerReference = null)
    {
        $this->customerReference = $customerReference;
        return $this;
    }

    /**
     * Buyers accounting string
     * Used by the buyer to specify a reference that should be repeated in e.g. invoice to enable the buyer
     * to automatically book e.g. to the right project, or account.
     * @return string
     */
    public function getAccountingCost()
    {
        return $this->accountingCost;
    }

    /**
     * Buyers accounting string
     * @param string|null $accountingCost
     * Used by the buyer to specify a reference that should be repeated in e.g. invoice to enable the buyer<br>
     * to automatically book e.g. to the right project, or account.
     * @example "1234:45435:243234"
     * @return $this
     * @optional
     */
    public function setAccountingCost($accountingCost = null)
    {
        $this->accountingCost = $accountingCost;
        return $this;
    }

    /**
     * Order validity end date
     * The end date for when the order is valid. The end date for the time period within which the seller must respond.
     * An order should contain the validity end date
     * @return \DateTime
     */
    public function getValidityPeriod()
    {
        return $this->validityPeriodEndDate;
    }

    /**
     * Order validity end date
     * @param \DateTime|null $validityPeriodEndDate
     * The end date for when the order is valid. The end date for the time period within<br>
     * which the seller must respond. An order should contain the validity end date
     * @example 2018-06-02
     * @return self
     * @optional
     */
    public function setValidityPeriod(\DateTime $validityPeriodEndDate = null)
    {
        $this->validityPeriodEndDate = $validityPeriodEndDate;
        return $this;
    }

    /**
     * Quotation reference
     * Reference to quotation which is basis for the order
     * Quotation document reference - a requirement to give a unique
     * reference to the quotation that is the base for the order
     * @return string
     */
    public function getQuotationDocumentReference()
    {
        return $this->quotationDocumentReference;
    }

    /**
     * Quotation reference
     * @param string|null $quotationDocumentReference
     * Quotation document reference - a requirement to give a unique<br>
     * reference to the quotation that is the base for the order
     * @example "1232424"
     * @return self
     * @optional
     */
    public function setQuotationDocumentReference($quotationDocumentReference = null)
    {
        $this->quotationDocumentReference = $quotationDocumentReference;
        return $this;
    }

    /**
     * Order document reference
     * Used to reference the initial order that was rejected and a new order is issued.
     * @return string
     */
    public function getOrderDocumentReference()
    {
        return $this->orderDocumentReference;
    }

    /**
     * Order document reference
     * @param string|null $orderDocumentReference
     * Used to reference the initial order that was rejected and a new order is issued
     * @example "4832423"
     * @return self
     * @optional
     */
    public function setOrderDocumentReference($orderDocumentReference = null)
    {
        $this->orderDocumentReference = $orderDocumentReference;
        return $this;
    }

    /**
     * Originator document reference
     * A reference to Originator Document. To be able to give a reference
     * to the internal requisition on the buyer site on which the order is based.
     * @return string
     */
    public function getOriginatorDocumentReference()
    {
        return $this->originatorDocumentReference;
    }

    /**
     * Originator document reference
     * @param string|null $originatorDocumentReference
     * A reference to Originator Document. To be able to give a reference<br>
     * to the internal requisition on the buyer site on which the order is based.
     * @example "5435235"
     * @return self
     * @optional
     */
    public function setOriginatorDocumentReference($originatorDocumentReference = null)
    {
        $this->originatorDocumentReference = $originatorDocumentReference;
        return $this;
    }

    /**
     * Additional documents
     * @return AdditionalDocumentReference[]
     */
    public function getAdditionalDocumentReferences()
    {
        return $this->additionalDocumentReferences;
    }

    /**
     * Additional documents
     * @param AdditionalDocumentReference[]|null $additionalDocumentReferences Additional documents
     * @return $this
     * @optional
     */
    public function setAdditionalDocumentReferences(array $additionalDocumentReferences = null)
    {
        $this->additionalDocumentReferences = $additionalDocumentReferences;
        return $this;
    }

    /**
     * Contract information
     * Reference to contract
     * positive identification of the reference such as a unique identifier
     * @return string
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Contract information
     * Reference to contract
     * @param string|null $referenceID positive identification of the reference such as a unique identifier
     * @return self
     * @optional
     */
    public function setContract($referenceID = null)
    {
        $this->contract = $referenceID;
        return $this;
    }

    /**
     * Buyer information
     * Description of buyer
     * @return Party
     */
    public function getBuyerCustomerParty()
    {
        return $this->buyerCustomerParty;
    }

    /**
     * Buyer information
     * @param Party $buyerCustomerParty Description of buyer
     * @return self
     * @mandatory
     */
    public function setBuyerCustomerParty(Party $buyerCustomerParty)
    {
        $this->buyerCustomerParty = $buyerCustomerParty;
        return $this;
    }

    /**
     * Seller information
     * Description of seller
     * @return Party
     */
    public function getSellerSupplierParty()
    {
        return $this->sellerSupplierParty;
    }

    /**
     * Seller information
     * @param Party $sellerSupplierParty Description of seller
     * @return self
     * @mandatory
     */
    public function setSellerSupplierParty(Party $sellerSupplierParty)
    {
        $this->sellerSupplierParty = $sellerSupplierParty;
        return $this;
    }

    /**
     * Originator party
     * Information regarding the originator of the order
     * @return Party
     */
    public function getOriginatorCustomerParty() {
        return $this->originatorCustomerParty;
    }

    /**
     * Originator party
     * @param Party|null $originatorCustomerParty Information regarding the originator of the order
     * @return $this
     * @optional
     */
    public function setOriginatorCustomerParty(Party $originatorCustomerParty = null) {
        $this->originatorCustomerParty = $originatorCustomerParty;
        return $this;
    }

    /**
     * Invoicee party
     * Information regarding the receiver of the invoice based on the order (Invoicee)
     * @return Party
     */
    public function getAccountingCustomerParty()
    {
        return $this->accountingCustomerParty;
    }

    /**
     * Invoicee party
     * @param Party|null $accountingCustomerParty
     * Information regarding the receiver of the invoice based on the order (Invoicee)
     * @return self
     * @optional
     */
    public function setAccountingCustomerParty(Party $accountingCustomerParty = null)
    {
        $this->accountingCustomerParty = $accountingCustomerParty;
        return $this;
    }

    /**
     * Delivery information
     * @return Delivery
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * Delivery information
     * @param Delivery|null $delivery Delivery information
     * @return self
     * @optional
     */
    public function setDelivery(Delivery $delivery = null)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * Terms of delivery
     * @return DeliveryTerms
     */
    public function getDeliveryTerms()
    {
        return $this->deliveryTerms;
    }

    /**
     * Terms of delivery
     * @param DeliveryTerms|null $deliveryTerms Terms of delivery
     * @return self
     * @optional
     */
    public function setDeliveryTerms(DeliveryTerms $deliveryTerms = null)
    {
        $this->deliveryTerms = $deliveryTerms;
        return $this;
    }

    /**
     * Payment terms
     * @return string
     */
    public function getPaymentTerms()
    {
        return $this->paymentTerms;
    }

    /**
     * Payment terms
     * @param string|null $note Payment terms for the order described in text
     * @return self
     * @optional
     */
    public function setPaymentTerms($note = null)
    {
        $this->paymentTerms = $note;
        return $this;
    }

    /**
     * Allowance and charge information
     * Allowances and charges for the order
     * @return AllowanceCharge[]
     */
    public function getAllowanceCharges()
    {
        return $this->allowanceCharges;
    }

    /**
     * Allowance and charge information
     * @param AllowanceCharge[]|null $allowanceCharges Allowances and charges for the order
     * @return self
     * @optional
     */
    public function setAllowanceCharges(array $allowanceCharges = null)
    {
        $this->allowanceCharges = $allowanceCharges;
        return $this;
    }

    /**
     * Tax total
     * Specification of expected tax amount
     * @return double
     */
    public function getTaxTotalAmount()
    {
        return $this->taxTotalAmount;
    }

    /**
     * Tax total
     * @param double $taxTotalAmount Specification of expected tax amount
     * @return self
     * @optional
     */
    public function setTaxTotalAmount($taxTotalAmount)
    {
        $this->taxTotalAmount = $taxTotalAmount;
        return $this;
    }

    /**
     * Anticipated monetary total
     * Estimated total amounts for the order
     * @return AnticipatedMonetaryTotal
     */
    public function getAnticipatedMonetaryTotal()
    {
        return $this->anticipatedMonetaryTotal;
    }

    /**
     * Anticipated monetary total
     * @param AnticipatedMonetaryTotal $anticipatedMonetaryTotal Estimated total amounts for the order
     * @return self
     * @optional
     */
    public function setAnticipatedMonetaryTotal(AnticipatedMonetaryTotal $anticipatedMonetaryTotal)
    {
        $this->anticipatedMonetaryTotal = $anticipatedMonetaryTotal;
        return $this;
    }

    /**
     * Order line
     * Specification of order lines
     * @return OrderLine[]
     */
    public function getOrderLine()
    {
        return $this->orderLines;
    }

    /**
     * Order line
     * @param OrderLine[] $orderLines Specification of order lines
     * @return self
     * @mandatory
     */
    public function setOrderLine(array $orderLines)
    {
        $this->orderLines = $orderLines;
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
        $obligatory = [
            'customizationID' => $this->customizationID,
            'profileID' => $this->profileID,
            'id' => $this->id,
            'issueDate' => $this->issueDate,
            'documentCurrencyCode' => $this->documentCurrencyCode,
            'buyerCustomerParty' => $this->buyerCustomerParty,
            'sellerSupplierParty' => $this->sellerSupplierParty,
        ];

        foreach ($obligatory as $name => $value) {
            if ($value === null) {
                throw new \InvalidArgumentException("Element cac:$name MUST be provided");
            }
        }

        if (!in_array($this->profileID, [self::PROFILE_ID_ORDERING, self::PROFILE_ID_ORDER_ONLY])) {
            throw new \InvalidArgumentException(
                "Element cac:ProfileID MUST one of "
                . implode(', ', [self::PROFILE_ID_ORDERING, self::PROFILE_ID_ORDER_ONLY])
            );
        }

        if (empty($this->orderLines)) {
            throw new \InvalidArgumentException("Element cac:OrderLine MUST be provided");
        }

        foreach ($this->orderLines as $line) {
            if (!$line instanceof OrderLine) {
                throw new \InvalidArgumentException("Element cac:OrderLine MUST be provided");
            }
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
            Schema::CBC . 'CustomizationID' => $this->customizationID,
            Schema::CBC . 'ProfileID' => $this->profileID,
            Schema::CBC . 'ID' => $this->id
        ]);

        if ($this->salesOrderId !== null) {
            $writer->write([
                Schema::CBC . 'SalesOrderID' => $this->salesOrderId
            ]);
        }

        $writer->write([
            Schema::CBC . 'IssueDate' => $this->issueDate->format('Y-m-d')
            ]);

        if ($this->issueTime !== null) {
            $writer->write([
                Schema::CBC . 'IssueTime' => $this->issueTime->format('H:i:s')
            ]);
        }

        if ($this->orderTypeCode !== null) {
            $writer->write([
                Schema::CBC . 'OrderTypeCode' => $this->orderTypeCode
            ]);
        }

        if ($this->note !== null) {
            $writer->write([
                Schema::CBC . 'Note' => $this->note
            ]);
        }

        $writer->write([
            Schema::CBC . 'DocumentCurrencyCode' => $this->documentCurrencyCode
        ]);

        if ($this->customerReference !== null) {
            $writer->write([
                Schema::CBC . 'CustomerReference' => $this->customerReference
            ]);
        }

        if ($this->accountingCost !== null) {
            $writer->write([
                Schema::CBC . 'AccountingCost' => $this->accountingCost
            ]);
        }

        if ($this->validityPeriodEndDate !== null) {
            $writer->write([
                Schema::CAC . 'ValidityPeriod' => [
                    Schema::CBC . 'EndDate' => $this->validityPeriodEndDate->format('Y-m-d')
                ]
            ]);
        }

        if ($this->quotationDocumentReference) {
            $writer->write([
                Schema::CAC . 'QuotationDocumentReference' => [Schema::CBC . 'ID' => $this->quotationDocumentReference]
            ]);
        }

        if ($this->orderDocumentReference !== null) {
            $writer->write([
                Schema::CAC . 'OrderDocumentReference' => [Schema::CBC . 'ID' => $this->orderDocumentReference]
            ]);
        }

        if ($this->originatorDocumentReference !== null) {
            $writer->write([
                Schema::CAC . 'OriginatorDocumentReference' => [Schema::CBC . 'ID' => $this->originatorDocumentReference]
            ]);
        }

        if ($this->additionalDocumentReferences !== null) {
            foreach ($this->additionalDocumentReferences as $additionalDocumentReference) {
                $writer->write([
                    Schema::CAC . 'AdditionalDocumentReference' => $additionalDocumentReference
                ]);
            }
        }

        if ($this->contract !== null) {
            $writer->write([
                Schema::CAC . 'Contract' => [Schema::CBC . 'ID' => $this->contract]
            ]);
        }

        $writer->write([
            Schema::CAC . 'BuyerCustomerParty' => [Schema::CAC . "Party" => $this->buyerCustomerParty]
        ]);

        $writer->write([
            Schema::CAC . 'SellerSupplierParty' => [Schema::CAC . "Party" => $this->sellerSupplierParty]
        ]);

        if ($this->originatorCustomerParty !== null) {
            $writer->write([
                Schema::CAC . 'OriginatorCustomerParty' => [Schema::CAC . "Party" => $this->originatorCustomerParty]
            ]);
        }

        if ($this->accountingCustomerParty !== null) {
            $writer->write([
                Schema::CAC . 'AccountingCustomerParty' => [Schema::CAC . "Party" => $this->accountingCustomerParty]
            ]);
        }

        if ($this->delivery !== null) {
            $writer->write([
                Schema::CAC . 'Delivery' => $this->delivery
            ]);
        }

        if ($this->deliveryTerms !== null) {
            $writer->write([
                Schema::CAC . 'DeliveryTerms' => $this->deliveryTerms
            ]);
        }

        if ($this->paymentTerms !== null) {
            $writer->write([
                Schema::CAC . 'PaymentTerms' => [Schema::CBC . 'Note' => $this->paymentTerms]
            ]);
        }

        if ($this->allowanceCharges !== null) {
            foreach ($this->allowanceCharges as $allowanceCharge) {
                $writer->write([
                    Schema::CAC . 'AllowanceCharge' => $allowanceCharge
                ]);
            }
        }

       if ($this->taxTotalAmount !== null) {
           $writer->write([
               Schema::CAC . 'TaxTotal' => [
                   [
                       'name' => Schema::CBC . 'TaxAmount',
                       'value' => number_format($this->taxTotalAmount, 2, '.', ''),
                       'attributes' => [
                           'currencyID' => Generator::$currencyID
                       ]
                   ]
               ]
           ]);
        }

        if ($this->anticipatedMonetaryTotal !== null) {
            $writer->write([
                Schema::CAC . 'AnticipatedMonetaryTotal' => $this->anticipatedMonetaryTotal
            ]);
        }

        foreach ($this->orderLines as $orderLine) {
            $writer->write([
                Schema::CAC . 'OrderLine' => $orderLine
            ]);
        }
    }
}
