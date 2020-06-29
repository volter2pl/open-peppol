<?php

namespace Volter\OpenPeppol\Order;

use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * Class AdditionalDocumentReference
 * @package Volter\OpenPeppol\Order
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AdditionalDocumentReference/
 */
class AdditionalDocumentReference implements XmlSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $documentType;

    /**
     * @var Attachment
     */
    private $attachment;

    /**
     * Document identifier
     * An identifier for the referenced document.
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Document identifier
     * @param string $id
     * An identifier for the referenced document.
     * @example "doc-34"
     * @return self
     * @mandatory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Document description
     * Textual description of the document.
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * Document description
     * @param string $documentType Textual description of the document.
     * @example "Timesheet"
     * @return self
     * @optional
     */
    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * @return Attachment
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Attachment(s)
     * @param Attachment $attachment Attachment(s)
     * @return self
     * @optional
     */
    public function setAttachment(Attachment $attachment)
    {
        $this->attachment = $attachment;
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
        if ($this->id === null) {
            throw new \InvalidArgumentException("Element 'cbc:ID' MUST be provided");
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
        $writer->write([
            Schema::CBC . 'ID' => $this->id
        ]);

        if ($this->documentType !== null) {
            $writer->write([
                Schema::CBC . 'DocumentType' => $this->documentType
            ]);
        }

        if ($this->attachment !== null) {
            $writer->write([
                Schema::CAC . 'Attachment' => $this->attachment
            ]);
        }
    }
}
