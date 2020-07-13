<?php

namespace Volter\OpenPeppol\Order\Delivery;

use Volter\OpenPeppol\Dict\Schema;
use Volter\OpenPeppol\Order\Party\Party;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Order\Common\RequestedDeliveryPeriod;

/**
 * Class Delivery
 * @package Volter\OpenPeppol\Order\Delivery
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-Delivery/
 */
class Delivery implements XmlSerializable
{
    /**
     * @var DeliveryLocation
     */
    private $deliveryLocation;

    /**
     * @var RequestedDeliveryPeriod
     */
    private $requestedDeliveryPeriod;

    /**
     * @var Party
     */
    private $deliveryParty;

    /**
     * Delivery location
     * @return DeliveryLocation
     */
    public function getDeliveryLocation()
    {
        return $this->deliveryLocation;
    }

    /**
     * Delivery location
     * @param DeliveryLocation|null $deliveryLocation Delivery location
     * @return self
     * @optional
     */
    public function setDeliveryLocation(DeliveryLocation $deliveryLocation = null)
    {
        $this->deliveryLocation = $deliveryLocation;
        return $this;
    }

    /**
     * Requested delivery period
     * @return RequestedDeliveryPeriod
     */
    public function getRequestedDeliveryPeriod()
    {
        return $this->requestedDeliveryPeriod;
    }

    /**
     * Requested delivery period
     * @param RequestedDeliveryPeriod|null $requestedDeliveryPeriod Requested delivery period
     * @return self
     * @optional
     */
    public function setRequestedDeliveryPeriod(RequestedDeliveryPeriod $requestedDeliveryPeriod = null)
    {
        $this->requestedDeliveryPeriod = $requestedDeliveryPeriod;
        return $this;
    }

    /**
     * Delivery party
     * @return Party
     */
    public function getDeliveryParty()
    {
        return $this->deliveryParty;
    }

    /**
     * Delivery party
     * @param Party|null $deliveryParty Delivery party
     * @return self
     * @optional
     */
    public function setDeliveryParty(Party $deliveryParty = null)
    {
        $this->deliveryParty = $deliveryParty;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        if ($this->deliveryLocation != null) {
            $writer->write([
                Schema::CAC . 'DeliveryLocation' => $this->deliveryLocation
            ]);
        }

        if ($this->requestedDeliveryPeriod != null) {
            $writer->write([
               Schema::CAC . 'RequestedDeliveryPeriod' => $this->requestedDeliveryPeriod
            ]);
        }

        if ($this->deliveryParty != null) {
            $writer->write([
               Schema::CAC . 'DeliveryParty' => $this->deliveryParty
            ]);
        }
    }
}
