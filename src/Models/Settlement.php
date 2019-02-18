<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Settlement extends Model
{
    /**
     * The payment methods.
     *
     * @var array
     */
    protected $paymentMethods;

    /**
     * The taxes.
     *
     * @var array
     */
    protected $taxes;

    /**
     * The amounts.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Amounts
     */
    protected $amounts;

    /**
     * The payment terms.
     *
     * @var array
     */
    protected $paymentTerms;

    /**
     * Returns the payment reference.
     *
     * @return string
     */
    public function paymentReference()
    {
        return (string) $this->children()->PaymentReference;
    }

    /**
     * Returns the currency.
     *
     * @return string
     */
    public function currency()
    {
        return (string) $this->children()->InvoiceCurrencyCode;
    }

    /**
     * Returns the payment methods.
     *
     * @return array
     */
    public function paymentMethods()
    {
        if (is_null($this->paymentMethods)) {
            $paymentMethods = [];

            foreach ($this->children()->SpecifiedTradeSettlementPaymentMeans as $paymentMethod) {
                $paymentMethods[] = new PaymentMethod($paymentMethod);
            }

            $this->paymentMethods = $paymentMethods;
        }

        return $this->paymentMethods;
    }

    /**
     * Returns the taxes.
     *
     * @return array
     */
    public function taxes()
    {
        if (is_null($this->taxes)) {
            $taxes = [];

            foreach ($this->children()->ApplicableTradeTax as $tax) {
                $taxes[] = new Tax($tax);
            }

            $this->taxes = $taxes;
        }

        return $this->taxes;
    }

    /**
     * Returns the amounts.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amounts
     */
    public function amounts()
    {
        if (is_null($this->amounts)) {
            $amounts = $this->children()->SpecifiedTradeSettlementMonetarySummation;

            $this->amounts = new Amounts($amounts);
        }

        return $this->amounts;
    }

    /**
     * Returns the payment terms.
     *
     * @return array
     */
    public function paymentTerms()
    {
        if (is_null($this->paymentTerms)) {
            $paymentTerms = [];

            foreach ($this->children()->SpecifiedTradePaymentTerms as $SpecifiedTradePaymentTerms) {
                $paymentTerms[] = new PaymentTerms($SpecifiedTradePaymentTerms);
            }

            $this->paymentTerms = $paymentTerms;
        }

        return $this->paymentTerms;
    }
}
