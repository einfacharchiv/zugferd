<?php

namespace einfachArchiv\ZUGFeRD\Models;

class DeliveryEvent extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * The occurrence date.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Date
     */
    protected $occurrenceDate;

    /**
     * Returns the occurrence date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function getOccurrenceDate()
    {
        if (is_null($this->occurrenceDate)) {
            $this->occurrenceDate = new Date($this->element->OccurrenceDateTime);
        }

        return $this->occurrenceDate;
    }
}
