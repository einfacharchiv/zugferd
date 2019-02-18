<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Tax extends Model
{
    /**
     * The tax.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $tax;

    /**
     * The basis amount.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $basisAmount;

    /**
     * Returns the tax.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function tax()
    {
        if (is_null($this->tax)) {
            $tax = $this->children()->CalculatedAmount;

            $this->tax = new Amount($tax);
        }

        return $this->tax;
    }

    /**
     * Returns the type code.
     *
     * @return string
     */
    public function typeCode()
    {
        return (string) $this->children()->TypeCode;
    }

    /**
     * Returns the basis amount.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function basisAmount()
    {
        if (is_null($this->basisAmount)) {
            $basisAmount = $this->children()->BasisAmount;

            $this->basisAmount = new Amount($basisAmount);
        }

        return $this->basisAmount;
    }

    /**
     * Returns the category code.
     *
     * @return string
     */
    public function categoryCode()
    {
        return (string) $this->children()->CategoryCode;
    }

    /**
     * Returns the percentage.
     *
     * @return float
     */
    public function percentage()
    {
        return (float) $this->children()->ApplicablePercent;
    }
}
