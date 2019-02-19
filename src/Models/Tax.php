<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Tax extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

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
            $this->tax = new Amount($this->element->CalculatedAmount);
        }

        return $this->tax;
    }

    /**
     * Returns the type code.
     *
     * @return string|null
     */
    public function typeCode()
    {
        return (string) $this->element->TypeCode ?: null;
    }

    /**
     * Returns the basis amount.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function basisAmount()
    {
        if (is_null($this->basisAmount)) {
            $this->basisAmount = new Amount($this->element->BasisAmount);
        }

        return $this->basisAmount;
    }

    /**
     * Returns the category code.
     *
     * @return string|null
     */
    public function categoryCode()
    {
        return (string) $this->element->CategoryCode ?: null;
    }

    /**
     * Returns the percentage.
     *
     * @return float|null
     */
    public function percentage()
    {
        return !empty($this->element->ApplicablePercent) ? (float) $this->element->ApplicablePercent : null;
    }
}
