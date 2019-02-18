<?php

namespace einfachArchiv\ZUGFeRD;

class Validator
{
    /**
     * The XML.
     *
     * @var string
     */
    protected $xml;

    /**
     * @param string $xml The XML
     */
    public function __construct($xml)
    {
        $this->xml = $xml;
    }

    /**
     * Validates the XML against the ZUGFeRD XSD.
     *
     * @return bool
     */
    public function validate()
    {
        $domDocument = new \DOMDocument();

        $domDocument->loadXML($this->xml);

        return $domDocument->schemaValidate(__DIR__.'/../zugferd10/Schema/ZUGFeRD1p0.xsd');
    }

    /**
     * Provides a static function.
     *
     * @return bool
     */
    public static function isValid($xml)
    {
        return (new static($xml))->validate();
    }
}
