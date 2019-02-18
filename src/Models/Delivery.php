<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Delivery extends Model
{
    /**
     * The delivery event.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\DeliveryEvent
     */
    protected $event;

    /**
     * Returns the delivery event.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\DeliveryEvent
     */
    public function event()
    {
        if (is_null($this->event)) {
            $event = $this->children()->ActualDeliverySupplyChainEvent;

            $this->event = new DeliveryEvent($event);
        }

        return $this->event;
    }

    /**
     * Returns the occurrence date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function occurrenceDate()
    {
        return $this->event()->occurrenceDate();
    }
}
