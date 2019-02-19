<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Address extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * Returns the first line.
     *
     * @return string|null
     */
    public function lineOne()
    {
        return (string) $this->element->LineOne ?: null;
    }

    /**
     * Returns the second line.
     *
     * @return string|null
     */
    public function lineTwo()
    {
        return (string) $this->element->LineTwo ?: null;
    }

    /**
     * Returns the zip code.
     *
     * @return string|null
     */
    public function zip()
    {
        return (string) $this->element->PostcodeCode ?: null;
    }

    /**
     * Returns the city.
     *
     * @return string|null
     */
    public function city()
    {
        return (string) $this->element->CityName ?: null;
    }

    /**
     * Returns the country.
     *
     * @return string|null
     */
    public function country()
    {
        return (string) $this->element->CountryID ?: null;
    }
}
