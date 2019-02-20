<?php

namespace einfachArchiv\ZUGFeRD\Models;

class TradeParty extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * The address.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Address
     */
    protected $address;

    /**
     * The tax numbers.
     *
     * @var array
     */
    protected $taxNumbers;

    /**
     * Returns the id.
     *
     * @return string|null
     */
    public function id()
    {
        return (string) $this->element->ID ?: null;
    }

    /**
     * Returns the name.
     *
     * @return string|null
     */
    public function name()
    {
        return (string) $this->element->Name ?: null;
    }

    /**
     * Returns the address.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Address
     */
    public function address()
    {
        if (is_null($this->address)) {
            $this->address = new Address($this->element->PostalTradeAddress);
        }

        return $this->address;
    }

    /**
     * Returns the tax numbers.
     *
     * @return array
     */
    public function taxNumbers()
    {
        if (is_null($this->taxNumbers)) {
            $taxNumbers = [];

            foreach ($this->element->SpecifiedTaxRegistration as $taxNumber) {
                $taxNumbers[] = new TaxNumber($taxNumber);
            }

            $this->taxNumbers = $taxNumbers;
        }

        return $this->taxNumbers;
    }
}
