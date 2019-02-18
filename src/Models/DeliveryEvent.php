<?php

namespace einfachArchiv\ZUGFeRD\Models;

class DeliveryEvent extends Model
{
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
    public function occurrenceDate()
    {
        if (is_null($this->occurrenceDate)) {
            $occurrenceDate = $this->children()->OccurrenceDateTime;

            $this->occurrenceDate = new Date($occurrenceDate);
        }

        return $this->occurrenceDate;
    }
}
