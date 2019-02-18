<?php

namespace einfachArchiv\ZUGFeRD\Models;

class FinancialAccount extends Model
{
    /**
     * Returns the IBAN.
     *
     * @return string
     */
    public function iban()
    {
        return (string) $this->children()->IBANID;
    }

    /**
     * Returns the name.
     *
     * @return string
     */
    public function name()
    {
        return (string) $this->children()->AccountName;
    }

    /**
     * Returns the id.
     *
     * @return string
     */
    public function id()
    {
        return (string) $this->children()->ProprietaryID;
    }
}
