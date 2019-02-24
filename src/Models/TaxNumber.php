<?php

namespace einfachArchiv\ZUGFeRD\Models;

class TaxNumber extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * Returns the number.
     *
     * @return string|null
     */
    public function getNumber()
    {
        return (string) $this->element->ID ?: null;
    }

    /**
     * Returns the type.
     *
     * @return string|null
     */
    public function getType()
    {
        if (empty($this->element->ID)) {
            return null;
        }

        return (string) $this->element->ID->attributes()->schemeID ?: null;
    }
}
