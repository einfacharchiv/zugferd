<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Header extends Model
{
    /**
     * The issue date.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Date
     */
    protected $issueDate;

    /**
     * The notes.
     *
     * @var array
     */
    protected $notes;

    /**
     * Returns the id.
     *
     * @return string
     */
    public function id()
    {
        return (string) $this->children()->ID;
    }

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
     * Returns the type code.
     *
     * @return string
     */
    public function typeCode()
    {
        return (string) $this->children()->TypeCode;
    }

    /**
     * Returns the issue date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function issueDate()
    {
        if (is_null($this->issueDate)) {
            $issueDate = $this->children()->IssueDateTime;

            $this->issueDate = new Date($issueDate);
        }

        return $this->issueDate;
    }

    /**
     * Returns the notes.
     *
     * @return array
     */
    public function notes()
    {
        if (is_null($this->notes)) {
            $notes = [];

            foreach ($this->children()->IncludedNote as $note) {
                $notes[] = new Note($note);
            }

            $this->notes = $notes;
        }

        return $this->notes;
    }
}
