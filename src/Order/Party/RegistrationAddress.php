<?php


namespace Volter\OpenPeppol\Order\Party;

use Volter\OpenPeppol\Dict\ISO3166;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Dict\Schema;

/**
 * Class RegistrationAddress
 * @package Volter\OpenPeppol\Order\Party
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-BuyerCustomerParty/cac-Party/cac-PartyLegalEntity/cac-RegistrationAddress/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-SellerSupplierParty/cac-Party/cac-PartyLegalEntity/cac-RegistrationAddress/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AccountingCustomerParty/cac-Party/cac-PartyLegalEntity/cac-RegistrationAddress/
 */
class RegistrationAddress implements XmlSerializable
{
    /**
     * @var string
     */
    private $cityName;

    /**
     * @var string
     */
    private $country;

    /**
     * Legal registration address city name
     * Associates with the registered address of the party within
     * a Corporate Registration Scheme. The name of a city, town, or village.
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * Legal registration address city name
     * @param string $cityName
     * Associates with the registered address of the party within<br>
     * a Corporate Registration Scheme. The name of a city, town, or village.
     * @return self
     * @optional
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
        return $this;
    }

    /**
     * Country code
     * A code that identifies the country.
     * The lists of valid countries are registered with the ISO 3166-1 Maintenance agency,
     * "Codes for the representation of names of countries and their subdivisions".
     * Codes must be according to the alpha-2 representation.
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Country code
     * @param string $identificationCode
     * A code that identifies the country.<br>
     * The lists of valid countries are registered with the ISO 3166-1 Maintenance agency,<br>
     * "Codes for the representation of names of countries and their subdivisions".<br>
     * Codes must be according to the alpha-2 representation.
     * @example "NL"
     * @see ISO3166
     * @return self
     * @mandatory
     */
    public function setCountry($identificationCode)
    {
        ISO3166::verify($identificationCode);
        $this->country = $identificationCode;
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
        ISO3166::verify($this->country);
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        if ($this->cityName !== null) {
            $writer->write([
                Schema::CBC . 'CityName' => $this->cityName
            ]);
        }

        $writer->write([
            Schema::CAC . 'Country' => [Schema::CBC . 'IdentificationCode' => $this->country]
        ]);
    }
}
