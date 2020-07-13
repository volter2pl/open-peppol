<?php

namespace Volter\OpenPeppol\Tests;

use Volter\OpenPeppol\Dict\ISO4217;
use Volter\OpenPeppol\Dict\EAS;
use Volter\OpenPeppol\Dict\ISO3166;
use Volter\OpenPeppol\Dict\ISO6523ICD;
use Volter\OpenPeppol\Dict\OrderTypeCode;
use Volter\OpenPeppol\Dict\TaxSchemeID;
use Volter\OpenPeppol\Dict\UNCL5189;
use Volter\OpenPeppol\Dict\UNCL5305;
use Volter\OpenPeppol\Dict\UNCL7161;
use Volter\OpenPeppol\Dict\UnitCode;
use Volter\OpenPeppol\Generator;
use Volter\OpenPeppol\Order\AdditionalDocumentReference;
use Volter\OpenPeppol\Order\AllowanceCharge;
use Volter\OpenPeppol\Order\AnticipatedMonetaryTotal;
use Volter\OpenPeppol\Order\Attachment;
use Volter\OpenPeppol\Order\Common\RequestedDeliveryPeriod;
use Volter\OpenPeppol\Order\Delivery\Delivery;
use Volter\OpenPeppol\Order\Delivery\DeliveryLocation;
use Volter\OpenPeppol\Order\DeliveryTerms;
use Volter\OpenPeppol\Order\Order;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Item\AdditionalItemProperty;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Item\ClassifiedTaxCategory;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Item\CommodityClassification;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Item\ItemInstance;
use Volter\OpenPeppol\Order\OrderLine\LineItem\OriginatorParty;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Price\Price;
use Volter\OpenPeppol\Order\OrderLine\OrderLine;
use Volter\OpenPeppol\Order\Party\Contact;
use Volter\OpenPeppol\Order\Party\Party;
use Volter\OpenPeppol\Order\OrderLine\LineItem\LineItem;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Item\Item;
use Volter\OpenPeppol\Order\OrderLine\LineItem\AllowanceCharge as LI_AllowanceCharge;
use Volter\OpenPeppol\Order\OrderLine\LineItem\Price\AllowanceCharge as LI_PR_AllowanceCharge;
use Volter\OpenPeppol\Order\Party\PartyLegalEntity;
use Volter\OpenPeppol\Order\Party\PartyTaxScheme;
use Volter\OpenPeppol\Order\Common\Address;
use Volter\OpenPeppol\Order\Party\RegistrationAddress;
use Volter\OpenPeppol\Order\TaxCategory;
use PHPUnit\Framework\TestCase;

/**
 * Test an UBL2.1 order document
 */
class OrderTest extends TestCase
{
    const SCHEMA = 'http://docs.oasis-open.org/ubl/os-UBL-2.1/xsd/maindoc/UBL-Order-2.1.xsd';

    /** @test */
    public function testNamespace()
    {
        try {
            $success = true;
            $message = 'ok';
            new \Volter\OpenPeppol\Dict\ISO4217();
            new \Volter\OpenPeppol\Dict\EAS();
            new \Volter\OpenPeppol\Dict\ISO3166();
            new \Volter\OpenPeppol\Dict\ISO6523ICD();
            new \Volter\OpenPeppol\Dict\OrderTypeCode();
            new \Volter\OpenPeppol\Dict\Schema();
            new \Volter\OpenPeppol\Dict\UNCL5305();
            new \Volter\OpenPeppol\Dict\UNCL7161();
            new \Volter\OpenPeppol\Dict\UnitCode();
            new \Volter\OpenPeppol\Order\Common\Address();
            new \Volter\OpenPeppol\Order\Common\RequestedDeliveryPeriod();
            new \Volter\OpenPeppol\Order\AdditionalDocumentReference();
            new \Volter\OpenPeppol\Order\AllowanceCharge();
            new \Volter\OpenPeppol\Order\AnticipatedMonetaryTotal();
            new \Volter\OpenPeppol\Order\Attachment();
            new \Volter\OpenPeppol\Order\DeliveryTerms();
            new \Volter\OpenPeppol\Order\Order();
            new \Volter\OpenPeppol\Order\Delivery\Delivery();
            new \Volter\OpenPeppol\Order\Delivery\DeliveryLocation();
            new \Volter\OpenPeppol\Order\OrderLine\OrderLine();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\AllowanceCharge();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\LineItem();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\OriginatorParty();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\Item\AdditionalItemProperty();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\Item\ClassifiedTaxCategory();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\Item\Item();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\Item\CommodityClassification();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\Item\ItemInstance();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\Price\AllowanceCharge();
            new \Volter\OpenPeppol\Order\OrderLine\LineItem\Price\Price();
            new \Volter\OpenPeppol\Order\Party\Contact();
            new \Volter\OpenPeppol\Order\Party\Party(\Volter\OpenPeppol\Order\Party\Party::BUYER_CUSTOMER_PARTY);
            new \Volter\OpenPeppol\Order\Party\Party(\Volter\OpenPeppol\Order\Party\Party::SELLER_SUPPLIER_PARTY);
            new \Volter\OpenPeppol\Order\Party\Party(\Volter\OpenPeppol\Order\Party\Party::ACCOUNTING_CUSTOMER_PARTY);
            new \Volter\OpenPeppol\Order\Party\Party(\Volter\OpenPeppol\Order\Party\Party::ORIGINATOR_CUSTOMER_PARTY);
            new \Volter\OpenPeppol\Order\Party\Party(\Volter\OpenPeppol\Order\Party\Party::DELIVERY_PARTY);
            new \Volter\OpenPeppol\Order\Party\PartyLegalEntity();
            new \Volter\OpenPeppol\Order\Party\PartyTaxScheme();
            new \Volter\OpenPeppol\Order\Party\RegistrationAddress();
        } catch (\Exception $exception) {
            $success = false;
            $message = $exception->getMessage();
        }

        $this->assertEquals(true, $success, $message);
    }

    /**
     * Test if minimal XML is valid
     */
    public function testMinimalXMLIsValid()
    {
        $sellerSupplierParty = (new Party(Party::SELLER_SUPPLIER_PARTY))
            ->setPostalAddress(
                (new Address())->setCountry(ISO3166::POLAND)
            )
            ->setEndpointID('7300010000001', EAS::CODE_9945)
            ->setPartyLegalEntity(
                (new PartyLegalEntity())->setRegistrationName("SELLER_SUPPLIER_PARTY")
            );

        $buyerCustomerParty = (new Party(Party::BUYER_CUSTOMER_PARTY))
            ->setEndpointID('7300010000001', EAS::CODE_9945)
            ->setPartyLegalEntity(
                (new PartyLegalEntity())->setRegistrationName("BUYER_CUSTOMER_PARTY")
            );


        $lineItem = (new LineItem())->setID("1")
            ->setQuantity(10.5, UnitCode::KILOGRAM)
            ->setItem(
                (new Item())->setName('treblinki do kombajnu')
            );

        $orderLines = [
            (new OrderLine())->setLineItems($lineItem)
        ];

        // Order object
        $order = (new Order())
            ->setId('0-123')
            ->setIssueDate(new \DateTime())
            ->setDocumentCurrencyCode(ISO4217::PLN)
            ->setBuyerCustomerParty($buyerCustomerParty)
            ->setSellerSupplierParty($sellerSupplierParty)
            ->setOrderLine($orderLines);

        // Empty optional fields
        $order
            ->setNote(null)
            ->setAdditionalDocumentReferences(null)
            ->setDelivery(null);


        // Test created object
        // Use \Volter\OpenPeppol\Generator() to generate an XML string
        $generator = new Generator();
        $outputXMLString = $generator->order($order, ISO4217::PLN);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);

        $this->assertEquals(true, $dom->schemaValidate(self::SCHEMA));
    }

    /**
     * Test if full XML is valid
     */
    public function testFullXMLIsValid()
    {
        $exampleFile = __DIR__ . '/../composer.json';

        $additionalDocumentReferences = [
            (new AdditionalDocumentReference())
                ->setId('doc-34')
                ->setDocumentType('composer json')
                ->setAttachment(
                    (new Attachment())->setFilePath($exampleFile)
                ),
            (new AdditionalDocumentReference())
                ->setId('doc-34')
                ->setDocumentType('google search')
                ->setAttachment(
                    (new Attachment())->setExternalReference('https://google.com/')
                ),
            (new AdditionalDocumentReference())
                ->setId('doc-34')
                ->setDocumentType('file with link')
                ->setAttachment(
                    (new Attachment())
                        ->setFilePath($exampleFile)
                        ->setExternalReference('https://google.com/')
                )
        ];

        /*
        * PARTY BEGIN
        */

        $partyContact = (new Contact())
            ->setName("Grzegorz Brzęczyszczykiewicz")
            ->setElectronicMail("grzegorz@example.com")
            ->setTelephone("+48 500 600 700");

        $partyLegalEntity = (new PartyLegalEntity())
            ->setRegistrationName('Międzynarodowe Targi Poznańskie sp. z o.o.')
            ->setCompanyID('987654321', ISO6523ICD::CODE_0088)
            ->setRegistrationAddress(
                (new RegistrationAddress())
                    ->setCityName('Poznań')
                    ->setCountry(ISO3166::POLAND)
            );

        $address = (new Address())
            ->setStreetName('Głogowska 14')
            ->setAdditionalStreetName('wejście od ul. Śniadeckich')
            ->setCityName('Poznań')
            ->setPostalZone('60-001')
            ->setCountrySubentity('Wielkopolska')
            ->setAddressLine('Sala Ziemi')
            ->setCountry(ISO3166::POLAND);

        $buyerCustomerParty = (new Party(Party::BUYER_CUSTOMER_PARTY))
            ->setEndpointID('7300010000001', EAS::CODE_9945)
            ->setPartyIdentification('7300010000001', ISO6523ICD::CODE_0088)
            ->setPartyName('Buyer name')
            ->setPostalAddress($address)
            ->setPartyTaxScheme(
                (new PartyTaxScheme())
                    ->setTaxScheme(TaxSchemeID::VAT)
                    ->setCompanyID('PL7006005040')
            )
            ->setPartyLegalEntity($partyLegalEntity)
            ->setContact($partyContact);

        $sellerSupplierParty = (new Party(Party::SELLER_SUPPLIER_PARTY))
            ->setEndpointID('7300010000001', EAS::CODE_9945)
            ->setPartyIdentification('7300010000001', ISO6523ICD::CODE_0088)
            ->setPartyName('Seller name')
            ->setPostalAddress($address)
            ->setPartyLegalEntity($partyLegalEntity)
            ->setContact($partyContact);

        $originatorCustomerParty = (new Party(Party::ORIGINATOR_CUSTOMER_PARTY))
            ->setPartyIdentification('7300010000001', ISO6523ICD::CODE_0088)
            ->setPartyName('Originator name')
            ->setContact($partyContact);

        $accountingCustomerParty = (new Party(Party::ACCOUNTING_CUSTOMER_PARTY))
            ->setEndpointID('7300010000001', EAS::CODE_9945)
            ->setPartyIdentification('7300010000001', ISO6523ICD::CODE_0088)
            ->setPartyName('Invoicee name')
            ->setPostalAddress($address)
            ->setPartyTaxScheme(
                (new PartyTaxScheme())
                    ->setTaxScheme(TaxSchemeID::VAT)
                    ->setCompanyID('PL7006005040')
            )
            ->setPartyLegalEntity($partyLegalEntity)
            ->setContact($partyContact);

        /*
         * PARTY END
         */

        $orderAllowanceCharges = [
            (new AllowanceCharge())
                ->setChargeIndicator(true) // Opłata (Charge)
                ->setAllowanceChargeReasonCode(UNCL7161::FC)
                ->setAllowanceChargeReason('Freight service')
                ->setMultiplierFactorNumeric(2)
                ->setAmount(pi())
                ->setBaseAmount(pi())
                ->setTaxCategory(
                    (new TaxCategory())->setId(UNCL5305::S)->setPercent(25)->setTaxScheme(TaxSchemeID::VAT)
                ),
            (new AllowanceCharge())
                ->setChargeIndicator(false) // Ulga (Allowance)
                ->setAllowanceChargeReasonCode(UNCL5189::PRODUCTION_ERROR_DISCOUNT)
                ->setAllowanceChargeReason('Production error discount)')
                ->setMultiplierFactorNumeric(10)
                ->setAmount(pi())
                ->setBaseAmount(pi())
                ->setTaxCategory(
                    (new TaxCategory())->setId(UNCL5305::AE)->setPercent(pi())->setTaxScheme(TaxSchemeID::GST)
                ),
        ];

        $lineItems = [
            (new LineItem())
                ->setID("1")
                ->setQuantity(10.5, UnitCode::KILOGRAM)
                ->setLineExtensionAmount(pi())
                ->setPartialDeliveryIndicator(true)
                ->setAccountingCost('text')
                ->setDelivery(
                    (new RequestedDeliveryPeriod())->setStartDate(new \DateTime())->setEndDate(new \DateTime())
                )
                ->setOriginatorParty(
                    (new OriginatorParty())
                        ->setOriginatorParty('7300010000001', ISO6523ICD::CODE_0088)
                        ->setName('Originator name')
                )
                ->setAllowanceCharges([
                    (new LI_AllowanceCharge())
                        ->setChargeIndicator(true) // Opłata (Charge)
                        ->setAllowanceChargeReasonCode(UNCL7161::FC)
                        ->setAllowanceChargeReason('Freight service')
                        ->setMultiplierFactorNumeric(2)
                        ->setAmount(pi())
                        ->setBaseAmount(pi()),
                    (new LI_AllowanceCharge())
                        ->setChargeIndicator(false) // Ulga (Allowance)
                        ->setAllowanceChargeReasonCode(UNCL5189::PRODUCTION_ERROR_DISCOUNT)
                        ->setAllowanceChargeReason('Production error discount)')
                        ->setMultiplierFactorNumeric(10)
                        ->setAmount(pi())
                        ->setBaseAmount(pi()),
                ])
                ->setPrice(
                    (new Price())
                        ->setPriceAmount(pi())
                        ->setBaseQuantity(1.0, UnitCode::PIECE)
                        ->setAllowanceCharge(
                            (new LI_PR_AllowanceCharge())
                                ->setAmount(pi())
                                ->setBaseAmount(pi())
                        )
                )
                ->setItem(
                    (new Item())
                        ->setDescription('text text text')
                        ->setName('treblinki do kombajnu')
                        ->setBuyersItemIdentification('ABC123')
                        ->setSellersItemIdentification('123ABC')
                        ->setStandardItemIdentification('A-B-C-1-2-3')
                        ->setItemSpecificationDocumentReferences(['aaa', 'bbb', 'ccc'])
                        ->setCommodityClassifications([
                            (new CommodityClassification())->setItemClassificationCode(
                                "9873242", "STI", "20.0602", "Office furniture"
                            ),
                            (new CommodityClassification())->setItemClassificationCode(
                                "9873242", "STI", "20.0602", "Office furniture"
                            )
                        ])
                        ->setClassifiedTaxCategory(
                            (new ClassifiedTaxCategory())
                                ->setId(UNCL5305::S)
                                ->setPercent(25)
                                ->setTaxScheme(TaxSchemeID::VAT)
                        )

                        ->setAdditionalItemProperties([
                            (new AdditionalItemProperty())
                                ->setName('Color')
                                ->setNameCode('#FF0000', 'HTML')
                                ->setValue('Red')
                                ->setValueQuantity(pi(), UnitCode::UNIT)
                                ->setValueQualifier('XYZ'),
                            (new AdditionalItemProperty())
                                ->setName('Color')
                                ->setNameCode('#00FF00', 'HTML')
                                ->setValue('Green')
                                ->setValueQuantity(pi(), UnitCode::UNIT)
                                ->setValueQualifier('XYZ'),
                        ])
                        ->setItemInstances([
                            (new ItemInstance())->setSerialID('ABC')->setLotIdentification('XYZ'),
                            (new ItemInstance())->setSerialID('DEF')->setLotIdentification('QWE'),
                        ])

                ),
            (new LineItem())
                ->setID("2")
                ->setQuantity(3, UnitCode::PIECE)
                ->setItem(
                    (new Item())->setName('karburator')
                )
        ];

        // Order object
        $order = (new Order())
            ->setId('0-123')
            ->setSalesOrderID('112233')
            ->setIssueDate(new \DateTime())
            ->setIssueTime(new \DateTime())
            ->setOrderTypeCode(OrderTypeCode::CONSIGNMENT_ORDER)
            ->setNote('Packages of other sizes are OK')
            ->setDocumentCurrencyCode(ISO4217::PLN)
            ->setCustomerReference('oik987')
            ->setAccountingCost('1234:45435:243234')
            ->setValidityPeriod(new \DateTime())
            ->setQuotationDocumentReference("1232424")
            ->setOrderDocumentReference('4832423')
            ->setOriginatorDocumentReference('5435235')
            ->setAdditionalDocumentReferences($additionalDocumentReferences)
            ->setContract("contract_id")
            ->setBuyerCustomerParty($buyerCustomerParty)
            ->setSellerSupplierParty($sellerSupplierParty)
            ->setOriginatorCustomerParty($originatorCustomerParty)
            ->setAccountingCustomerParty($accountingCustomerParty)
            ->setDelivery(
                (new Delivery())
                    ->setDeliveryParty(
                        (new Party(Party::DELIVERY_PARTY))
                            ->setPartyIdentification('987654321', ISO6523ICD::CODE_0088)
                            ->setPartyName('Surgery department')
                            ->setContact($partyContact)
                            ->setPostalAddress($address)
                    )
                    ->setDeliveryLocation(
                        (new DeliveryLocation())
                            ->setID('7300010000001', ISO6523ICD::CODE_0088)
                            ->setName('South side goods arrival dock')
                            ->setAddress($address)
                    )
                    ->setRequestedDeliveryPeriod(
                        (new RequestedDeliveryPeriod())
                            ->setStartDate(new \DateTime())
                            ->setStartDate(new \DateTime())
                    )
            )
            ->setDeliveryTerms(
                (new DeliveryTerms())
                    ->setID('FOB')
                    ->setSpecialTerms('ABC')
                    ->setDeliveryLocation('Rotterdam')
            )
            ->setAllowanceCharges($orderAllowanceCharges)
            ->setTaxTotalAmount(pi())
            ->setAnticipatedMonetaryTotal(
                (new AnticipatedMonetaryTotal())
                    ->setLineExtensionAmount(pi())
                    ->setTaxExclusiveAmount(pi())
                    ->setTaxInclusiveAmount(pi())
                    ->setAllowanceTotalAmount(pi())
                    ->setChargeTotalAmount(pi())
                    ->setPrepaidAmount(pi())
                    ->setPayableRoundingAmount(pi())
                    ->setPayableAmount(pi())
            )
            ->setOrderLine(
                [
                    (new OrderLine())->setLineItems($lineItems[0])->setNote('text text text'),
                    (new OrderLine())->setLineItems($lineItems[1])->setNote('text text text')
                ]
            );

        // Test created object
        // Use \Volter\OpenPeppol\Generator() to generate an XML string
        $generator = new Generator();
        $outputXMLString = $generator->order($order, ISO4217::PLN);

        // Create PHP Native DomDocument object, that can be
        // used to validate the generate XML
        $dom = new \DOMDocument;
        $dom->loadXML($outputXMLString);
        $this->assertEquals(true, $dom->schemaValidate(self::SCHEMA));
    }
}
