<?php

namespace einfachArchiv\ZUGFeRD\Models;

class TradeParty extends Model
{
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
     * Returns the name.
     *
     * @return string
     */
    public function name()
    {
        return (string) $this->children()->Name;
    }

    /**
     * Returns the address.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Address
     */
    public function address()
    {
        if (is_null($this->address)) {
            $address = $this->children()->PostalTradeAddress;

            $this->address = new Address($address);
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

            foreach ($this->children()->SpecifiedTaxRegistration as $taxNumber) {
                $taxNumbers[] = new TaxNumber($taxNumber);
            }

            $this->taxNumbers = $taxNumbers;
        }

        return $this->taxNumbers;
    }
}
