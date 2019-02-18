<?php

namespace einfachArchiv\ZUGFeRD\Models;

class FinancialInstitution extends Model
{
    /**
     * Returns the BIC.
     *
     * @return string
     */
    public function bic()
    {
        return (string) $this->children()->BICID;
    }

    /**
     * Returns the name.
     *
     * @return string
     */
    public function name()
    {
        return (string) $this->children()->Name;
    }
}
