<?php

namespace einfachArchiv\ZUGFeRD\Models;

class FinancialAccount extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * Returns the IBAN.
     *
     * @return string|null
     */
    public function iban()
    {
        return (string) $this->element->IBANID ?: null;
    }

    /**
     * Returns the name.
     *
     * @return string|null
     */
    public function name()
    {
        return (string) $this->element->AccountName ?: null;
    }

    /**
     * Returns the id.
     *
     * @return string|null
     */
    public function id()
    {
        return (string) $this->element->ProprietaryID ?: null;
    }
}
