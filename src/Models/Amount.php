<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Amount extends Model
{
    /**
     * Returns the amount.
     *
     * @return float
     */
    public function amount()
    {
        return (float) $this->simpleXml;
    }

    /**
     * Returns the currency.
     *
     * @return string
     */
    public function currency()
    {
        return (string) @$this->simpleXml->attributes()->currencyID;
    }
}
