<?php

namespace einfachArchiv\ZUGFeRD\Models;

class PaymentTerms extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * The due date.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Date
     */
    protected $dueDate;

    /**
     * Returns the description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return (string) $this->element->Description ?: null;
    }

    /**
     * Returns the due date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function getDueDate()
    {
        if (is_null($this->dueDate)) {
            $this->dueDate = new Date($this->element->DueDateDateTime);
        }

        return $this->dueDate;
    }
}
