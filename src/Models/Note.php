<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Note extends Model
{
    /**
     * Returns the note.
     *
     * @return string
     */
    public function note()
    {
        return (string) $this->simpleXml->Content;
    }
}
