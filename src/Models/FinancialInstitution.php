<?php

namespace einfachArchiv\ZUGFeRD\Models;

class FinancialInstitution extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * Returns the BIC.
     *
     * @return string|null
     */
    public function getBic()
    {
        return (string) $this->element->BICID ?: null;
    }

    /**
     * Returns the name.
     *
     * @return string|null
     */
    public function getName()
    {
        return (string) $this->element->Name ?: null;
    }
}
