<?php

namespace Volter\OpenPeppol\Order;

use Volter\OpenPeppol\Dict\Schema;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

/**
 * Class Attachment
 * @package Volter\OpenPeppol\Order
 * @link https://test-docs.peppol.eu/poacc/upgrade-3/syntax/Order/cac-AdditionalDocumentReference/cac-Attachment/
 */
class Attachment implements XmlSerializable
{
    /**
     * @var string
     */
    private $filePath;

    /**
     * @var string
     */
    private $externalReference;

    /**
     * @return string
     */
    public function getFileMimeType()
    {
        return mime_content_type($this->filePath);
    }

    /**
     * Attached document
     * The attached document embeded as binary object, coded as Base64.
     * The binary object has two supplementary components: a Mime Code, which specifies the Mime type
     * of the attachment and a Filename that is provided by (or on behalf of) the sender of the document
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Attached document
     * @param string|null $filePath
     * The attached document embeded as binary object, coded as Base64.<br>
     * The binary object has two supplementary components: a Mime Code, which specifies the Mime type<br>
     * of the attachment and a Filename that is provided by (or on behalf of) the sender of the document
     * @return self
     * @optional
     */
    public function setFilePath($filePath = null)
    {
        $this->filePath = $filePath;
        return $this;
    }

    /**
     * External document URI
     * The Uniform Resource Identifier (URI) that identifies where the external document is located.
     * @return string
     */
    public function getExternalReference()
    {
        return $this->externalReference;
    }

    /**
     * External document URI
     * @param string|null $uri
     * The Uniform Resource Identifier (URI) that identifies where the external document is located.
     * @example "http://www.test.eu/image.jpg"
     * @return $this
     * @optional
     */
    public function setExternalReference($uri = null)
    {
        $this->externalReference = $uri;
        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     * @return void
     */
    public function validate()
    {
        if ($this->filePath !== null && !file_exists($this->filePath)) {
            throw new InvalidArgumentException('Attachment at filePath does not exist');
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

        if ($this->filePath !== null) {
            $fileContents = base64_encode(file_get_contents($this->filePath));
            $mimeType = $this->getFileMimeType();

            $writer->write([
                'name' => Schema::CBC . 'EmbeddedDocumentBinaryObject',
                'value' => $fileContents,
                'attributes' => [
                    'mimeCode' => $mimeType,
                    'filename' => basename($this->filePath)
                ]
            ]);
        }

        if ($this->externalReference !== null) {
            $writer->write([
                Schema::CAC . 'ExternalReference' => [Schema::CBC . 'URI' => $this->externalReference]
            ]);
        }
    }
}
