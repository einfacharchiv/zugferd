<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Amounts extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * The line total.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $lineTotal;

    /**
     * The charge total.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $chargeTotal;

    /**
     * The allowance total.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $allowanceTotal;

    /**
     * The tax basis total.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $taxBasisTotal;

    /**
     * The tax total.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $taxTotal;

    /**
     * The grand total.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $grandTotal;

    /**
     * The total prepaid.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $totalPrepaid;

    /**
     * The total allowance charge.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $totalAllowanceCharge;

    /**
     * The due payable.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amount
     */
    protected $duePayable;

    /**
     * Returns the line total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function lineTotal()
    {
        if (is_null($this->lineTotal)) {
            $this->lineTotal = new Amount($this->element->LineTotalAmount);
        }

        return $this->lineTotal;
    }

    /**
     * Returns the charge total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function chargeTotal()
    {
        if (is_null($this->chargeTotal)) {
            $this->chargeTotal = new Amount($this->element->ChargeTotalAmount);
        }

        return $this->chargeTotal;
    }

    /**
     * Returns the allowance total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function allowanceTotal()
    {
        if (is_null($this->allowanceTotal)) {
            $this->allowanceTotal = new Amount($this->element->AllowanceTotalAmount);
        }

        return $this->allowanceTotal;
    }

    /**
     * Returns the tax basis total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function taxBasisTotal()
    {
        if (is_null($this->taxBasisTotal)) {
            $this->taxBasisTotal = new Amount($this->element->TaxBasisTotalAmount);
        }

        return $this->taxBasisTotal;
    }

    /**
     * Returns the tax total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function taxTotal()
    {
        if (is_null($this->taxTotal)) {
            $this->taxTotal = new Amount($this->element->TaxTotalAmount);
        }

        return $this->taxTotal;
    }

    /**
     * Returns the grand total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function grandTotal()
    {
        if (is_null($this->grandTotal)) {
            $this->grandTotal = new Amount($this->element->GrandTotalAmount);
        }

        return $this->grandTotal;
    }

    /**
     * Returns the total prepaid.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function totalPrepaid()
    {
        if (is_null($this->totalPrepaid)) {
            $this->totalPrepaid = new Amount($this->element->TotalPrepaidAmount);
        }

        return $this->totalPrepaid;
    }

    /**
     * Returns the total allowance charge.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function totalAllowanceCharge()
    {
        if (is_null($this->totalAllowanceCharge)) {
            $this->totalAllowanceCharge = new Amount($this->element->TotalAllowanceChargeAmount);
        }

        return $this->totalAllowanceCharge;
    }

    /**
     * Returns the due payable.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function duePayable()
    {
        if (is_null($this->duePayable)) {
            $this->duePayable = new Amount($this->element->DuePayableAmount);
        }

        return $this->duePayable;
    }
}
