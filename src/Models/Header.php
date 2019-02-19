<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Header extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

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
     * Returns the type code.
     *
     * @return string|null
     */
    public function typeCode()
    {
        return (string) $this->element->TypeCode ?: null;
    }

    /**
     * Returns the issue date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function issueDate()
    {
        if (is_null($this->issueDate)) {
            $this->issueDate = new Date($this->element->IssueDateTime);
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

            foreach ($this->element->IncludedNote as $note) {
                $notes[] = new Note($note);
            }

            $this->notes = $notes;
        }

        return $this->notes;
    }
}
