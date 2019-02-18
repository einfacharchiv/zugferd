<?php

namespace einfachArchiv\ZUGFeRD\Models;

class PaymentTerms extends Model
{
    /**
     * The due date.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Date
     */
    protected $dueDate;

    /**
     * Returns the description.
     *
     * @return string
     */
    public function description()
    {
        return (string) $this->children()->Description;
    }

    /**
     * Returns the due date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function dueDate()
    {
        if (is_null($this->dueDate)) {
            $dueDate = $this->children()->DueDateDateTime;

            $this->dueDate = new Date($dueDate);
        }

        return $this->dueDate;
    }
}
