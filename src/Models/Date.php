<?php

namespace einfachArchiv\ZUGFeRD\Models;

use einfachArchiv\ZUGFeRD\Schema\Namespaces;

class Date extends Model
{
    /**
     * The children's namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = Namespaces::UDT;

    /**
     * Returns the date.
     *
     * @return string
     */
    public function date()
    {
        return (string) $this->children()->DateTimeString;
    }

    /**
     * Returns the format.
     *
     * @return string
     */
    public function format()
    {
        return (string) $this->children()->DateTimeString->attributes()->format;
    }
}
