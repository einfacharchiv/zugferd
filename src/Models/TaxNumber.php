<?php

namespace einfachArchiv\ZUGFeRD\Models;

class TaxNumber extends Model
{
    /**
     * Returns the number.
     *
     * @return string
     */
    public function number()
    {
        return (string) $this->children()->ID;
    }

    /**
     * Returns the type.
     *
     * @return string
     */
    public function type()
    {
        return (string) $this->children()->ID->attributes()->schemeID;
    }
}
