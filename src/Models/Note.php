<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Note extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * Returns the note.
     *
     * @return string|null
     */
    public function note()
    {
        return (string) $this->element->Content ?: null;
    }
}
