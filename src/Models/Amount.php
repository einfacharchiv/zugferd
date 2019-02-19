<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Amount extends Model
{
    /**
     * Returns the amount.
     *
     * @return float|null
     */
    public function amount()
    {
        return !empty($this->element) ? (float) $this->element : null;
    }

    /**
     * Returns the currency.
     *
     * @return string|null
     */
    public function currency()
    {
        if (empty($this->element)) {
            return null;
        }

        return (string) $this->element->attributes()->currencyID ?: null;
    }
}
