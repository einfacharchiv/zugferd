<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Settlement extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

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
     * @return string|null
     */
    public function getPaymentReference()
    {
        return (string) $this->element->PaymentReference ?: null;
    }

    /**
     * Returns the currency.
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return (string) $this->element->InvoiceCurrencyCode ?: null;
    }

    /**
     * Returns the payment methods.
     *
     * @return array
     */
    public function getPaymentMethods()
    {
        if (is_null($this->paymentMethods)) {
            $paymentMethods = [];

            foreach ($this->element->SpecifiedTradeSettlementPaymentMeans as $paymentMethod) {
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
    public function getTaxes()
    {
        if (is_null($this->taxes)) {
            $taxes = [];

            foreach ($this->element->ApplicableTradeTax as $tax) {
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
    public function getAmounts()
    {
        if (is_null($this->amounts)) {
            $this->amounts = new Amounts($this->element->SpecifiedTradeSettlementMonetarySummation);
        }

        return $this->amounts;
    }

    /**
     * Returns the payment terms.
     *
     * @return array
     */
    public function getPaymentTerms()
    {
        if (is_null($this->paymentTerms)) {
            $paymentTerms = [];

            foreach ($this->element->SpecifiedTradePaymentTerms as $SpecifiedTradePaymentTerms) {
                $paymentTerms[] = new PaymentTerms($SpecifiedTradePaymentTerms);
            }

            $this->paymentTerms = $paymentTerms;
        }

        return $this->paymentTerms;
    }
}
