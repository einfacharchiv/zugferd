<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Model
{
    /**
     * The namespaces.
     */
    const NAMESPACE_RSM = 'urn:ferd:CrossIndustryDocument:invoice:1p0';
    const NAMESPACE_XS = 'http://www.w3.org/2001/XMLSchema';
    const NAMESPACE_QDT = 'urn:un:unece:uncefact:data:standard:QualifiedDataType:12';
    const NAMESPACE_RAM = 'urn:un:unece:uncefact:data:standard:ReusableAggregateBusinessInformationEntity:12';
    const NAMESPACE_UDT = 'urn:un:unece:uncefact:data:standard:UnqualifiedDataType:15';

    /**
     * The types.
     */
    const TYPE_BASIC = 'BASIC';
    const TYPE_COMFORT = 'COMFORT';
    const TYPE_EXTENDED = 'EXTENDED';

    /**
     * The underlying SimpleXMLElement.
     *
     * @var \SimpleXMLElement
     */
    private $baseElement;

    /**
     * The current SimpleXMLElement.
     *
     * @var \SimpleXMLElement
     */
    protected $element;

    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace;

    /**
     * @param mixed $element The XML element
     */
    public function __construct($element)
    {
        if (is_string($element)) {
            $element = new \SimpleXMLElement($element);
        }

        $this->baseElement = $element;
        $this->element = $this->baseElement;

        if ($this->namespace) {
            $this->changeNamespace();
        }
    }

    /**
     * Changes the namespace.
     */
    protected function changeNamespace($namespace = null)
    {
        if ($namespace) {
            $this->namespace = $namespace;
        }

        if (!empty($this->baseElement[0])) {
            $this->element = $this->baseElement->children($this->namespace);
        }
    }
}
