<?php

namespace einfachArchiv\ZUGFeRD\Models;

use einfachArchiv\ZUGFeRD\Schema\Namespaces;

class Model
{
    /**
     * The SimpleXMLElement.
     *
     * @var \SimpleXMLElement
     */
    protected $simpleXml;

    /**
     * The children's namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = Namespaces::RAM;

    /**
     * The children.
     *
     * @var \SimpleXMLElement
     */
    protected $children;

    /**
     * @param string $simpleXml The SimpleXMLElement
     */
    public function __construct($simpleXml)
    {
        $this->simpleXml = $simpleXml;
    }

    /**
     * Returns the children.
     *
     * @return \SimpleXMLElement
     */
    protected function children()
    {
        if (is_null($this->children)) {
            $this->children = $this->simpleXml->children($this->namespace);
        }

        return $this->children;
    }
}
