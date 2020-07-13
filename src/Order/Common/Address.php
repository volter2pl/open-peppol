<?php

namespace Volter\OpenPeppol\Order\Common;

use Volter\OpenPeppol\Dict\ISO3166;
use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class PostalAddress
 * @package Volter\OpenPeppol\Order\Party
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-BuyerCustomerParty/cac-Party/cac-PostalAddress/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-SellerSupplierParty/cac-Party/cac-PostalAddress/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AccountingCustomerParty/cac-Party/cac-PostalAddress/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-Delivery/cac-DeliveryLocation/cac-Address/
 */
class Address implements XmlSerializable
{
    /**
     * @var string
     */
    private $streetName;

    /**
     * @var string
     */
    private $additionalStreetName;

    /**
     * @var string
     */
    private $cityName;

    /**
     * @var string
     */
    private $postalZone;

    /**
     * @var string
     */
    private $countrySubentity;

    /**
     * @var string
     */
    private $addressLine;

    /**
     * @var string
     */
    private $country;

    /**
     * Address line 1
     * The main address line in a postal address usually the street name and number.
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Address line 1
     * @param string|null $streetName
     * The main address line in a postal address usually the street name and number.
     * @return self
     * @optional
     */
    public function setStreetName($streetName = null)
    {
        $this->streetName = $streetName;
        return $this;
    }

    /**
     * Address line 2
     * An additional address line in a postal address that can be used to give further details<br>
     * supplementing the main line. Common use are secondary house number in a complex or in a building.
     * @return string
     */
    public function getAdditionalStreetName()
    {
        return $this->additionalStreetName;
    }

    /**
     * Address line 2
     * @param string|null $additionalStreetName
     * An additional address line in a postal address that can be used to give further details<br>
     * supplementing the main line. Common use are secondary house number in a complex or in a building.
     * @return self
     * @optional
     */
    public function setAdditionalStreetName($additionalStreetName = null)
    {
        $this->additionalStreetName = $additionalStreetName;
        return $this;
    }

    /**
     * City
     * The common name of the city where the postal address is. The name is written in full rather than as a code.
     * @return string
     */
    public function getCityName()
    {
        return $this->cityName;
    }

    /**
     * City
     * @param string $cityName
     * The common name of the city where the postal address is. The name is written in full rather than as a code.
     * @return self
     * @optional
     */
    public function setCityName($cityName)
    {
        $this->cityName = $cityName;
        return $this;
    }

    /**
     * Post code
     * The identifier for an addressable group of properties according to the relevant
     * national postal service, such as a ZIP code or Post Code.
     * @return string
     */
    public function getPostalZone()
    {
        return $this->postalZone;
    }

    /**
     * Post code
     * @param string $postalZone
     * The identifier for an addressable group of properties according to the relevant<br>
     * national postal service, such as a ZIP code or Post Code.
     * @return self
     * @optional
     */
    public function setPostalZone($postalZone)
    {
        $this->postalZone = $postalZone;
        return $this;
    }

    /**
     * Country subdivision
     * For specifying a region, county, state, province etc. within a country by using text.
     * @return string
     */
    public function getCountrySubentity()
    {
        return $this->countrySubentity;
    }

    /**
     * Country subdivision
     * @param string $countrySubentity
     * For specifying a region, county, state, province etc. within a country by using text.
     * @return self
     * @optional
     */
    public function setCountrySubentity($countrySubentity)
    {
        $this->countrySubentity = $countrySubentity;
        return $this;
    }

    /**
     * Address line 3
     * An additional address line in an address that can be used to
     * give further details supplementing the main line.
     * @return string
     */
    public function getAddressLine()
    {
        return $this->addressLine;
    }

    /**
     * Address line 3
     * @param string $addressLine
     * An additional address line in an address that can be used to<br>
     * give further details supplementing the main line.
     * @example "Gate 34"
     * @return self
     * @optional
     */
    public function setAddressLine($addressLine)
    {
        $this->addressLine = $addressLine;
        return $this;
    }

    /**
     * Country code
     * A code that identifies the country.
     * The lists of valid countries are registered with the ISO 3166-1 Maintenance agency,
     * "Codes for the representation of names of countries and their subdivisions".
     * Codes must be according to the alpha-2 representation.
     * @return string
     * @optional
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
        $this->validate();

        if ($this->streetName !== null) {
            $writer->write([
                Schema::CBC . 'StreetName' => $this->streetName
            ]);
        }

        if ($this->additionalStreetName !== null) {
            $writer->write([
                Schema::CBC . 'AdditionalStreetName' => $this->additionalStreetName
            ]);
        }

        if ($this->cityName !== null) {
            $writer->write([
                Schema::CBC . 'CityName' => $this->cityName,
            ]);
        }

        if ($this->postalZone !== null) {
            $writer->write([
                Schema::CBC . 'PostalZone' => $this->postalZone,
            ]);
        }

        if ($this->countrySubentity !== null) {
            $writer->write([
                Schema::CBC . 'CountrySubentity' => $this->countrySubentity,
            ]);
        }

        if ($this->addressLine !== null) {
            $writer->write([
                Schema::CAC . 'AddressLine' => [Schema::CBC . 'Line' => $this->addressLine],
            ]);
        }

        $writer->write([
            Schema::CAC . 'Country' => [Schema::CBC . 'IdentificationCode' => $this->country],
        ]);
    }
}
