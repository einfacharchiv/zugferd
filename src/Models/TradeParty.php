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
    public function getId()
    {
        return (string) $this->element->ID ?: null;
    }

    /**
     * Returns the name.
     *
     * @return string|null
     */
    public function getName()
    {
        return (string) $this->element->Name ?: null;
    }

    /**
     * Returns the address.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Address
     */
    public function getAddress()
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
    public function getTaxNumbers()
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

    /**
     * Returns the first line.
     *
     * @return string|null
     */
    public function getLineOne()
    {
        return $this->getAddress()->getLineOne();
    }

    /**
     * Returns the second line.
     *
     * @return string|null
     */
    public function getLineTwo()
    {
        return $this->getAddress()->getLineTwo();
    }

    /**
     * Returns the zip code.
     *
     * @return string|null
     */
    public function getZip()
    {
        return $this->getAddress()->getZip();
    }

    /**
     * Returns the city.
     *
     * @return string|null
     */
    public function getCity()
    {
        return $this->getAddress()->getCity();
    }

    /**
     * Returns the country.
     *
     * @return string|null
     */
    public function getCountry()
    {
        return $this->getAddress()->getCountry();
    }
}
