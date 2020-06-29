<?php

namespace Volter\OpenPeppol\Order\Common;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;
use Volter\OpenPeppol\Dict\Schema;

/**
 * Class RequestedDeliveryPeriod
 * @package Volter\OpenPeppol\Order\Common
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-Delivery/cac-RequestedDeliveryPeriod/
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-OrderLine/cac-LineItem/cac-Delivery/cac-RequestedDeliveryPeriod/
 */
class RequestedDeliveryPeriod implements XmlSerializable
{
    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * Period start date
     * The date on which the period starts. The start dates counts as part of the period.Format ="YYYY-MM-DD"
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Period start date
     * @param \DateTime $startDate
     * The date on which the period starts. The start dates counts as part of the period.Format ="YYYY-MM-DD"
     * @return self
     * @optional
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * Period end date
     * The date on which the period ends. The end date counts as part of the period.Format ="YYYY-MM-DD"
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Period end date
     * @param \DateTime $endDate
     * The date on which the period ends. The end date counts as part of the period.Format ="YYYY-MM-DD"
     * @return self
     * @optional
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     * @param Writer $writer
     * @return void
     */
    function xmlSerialize(Writer $writer)
    {
        if ($this->startDate !== null) {
            $writer->write([
                Schema::CBC . 'StartDate' => $this->startDate->format('Y-m-d')
            ]);
        }

        if ($this->endDate !== null) {
            $writer->write([
                Schema::CBC . 'EndDate' => $this->endDate->format('Y-m-d')
            ]);
        }
    }
}
