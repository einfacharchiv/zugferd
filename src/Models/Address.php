<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Address extends Model
{
    /**
     * Returns the first line.
     *
     * @return string
     */
    public function lineOne()
    {
        return (string) $this->children()->LineOne;
    }

    /**
     * Returns the second line.
     *
     * @return string
     */
    public function lineTwo()
    {
        return (string) $this->children()->LineTwo;
    }

    /**
     * Returns the zip code.
     *
     * @return string
     */
    public function zip()
    {
        return (string) $this->children()->PostcodeCode;
    }

    /**
     * Returns the city.
     *
     * @return string
     */
    public function city()
    {
        return (string) $this->children()->CityName;
    }

    /**
     * Returns the country.
     *
     * @return string
     */
    public function country()
    {
        return (string) $this->children()->CountryID;
    }
}
