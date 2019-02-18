<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Amounts extends Model
{
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
            $lineTotal = $this->children()->LineTotalAmount;

            $this->lineTotal = new Amount($lineTotal);
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
            $chargeTotal = $this->children()->ChargeTotalAmount;

            $this->chargeTotal = new Amount($chargeTotal);
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
            $allowanceTotal = $this->children()->AllowanceTotalAmount;

            $this->allowanceTotal = new Amount($allowanceTotal);
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
            $taxBasisTotal = $this->children()->TaxBasisTotalAmount;

            $this->taxBasisTotal = new Amount($taxBasisTotal);
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
            $taxTotal = $this->children()->TaxTotalAmount;

            $this->taxTotal = new Amount($taxTotal);
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
            $grandTotal = $this->children()->GrandTotalAmount;

            $this->grandTotal = new Amount($grandTotal);
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
            $totalPrepaid = $this->children()->TotalPrepaidAmount;

            $this->totalPrepaid = new Amount($totalPrepaid);
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
            $totalAllowanceCharge = $this->children()->TotalAllowanceChargeAmount;

            $this->totalAllowanceCharge = new Amount($totalAllowanceCharge);
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
            $duePayable = $this->children()->DuePayableAmount;

            $this->duePayable = new Amount($duePayable);
        }

        return $this->duePayable;
    }
}
