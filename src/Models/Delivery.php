<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Delivery extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

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
    public function getEvent()
    {
        if (is_null($this->event)) {
            $this->event = new DeliveryEvent($this->element->ActualDeliverySupplyChainEvent);
        }

        return $this->event;
    }

    /**
     * Returns the occurrence date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function getOccurrenceDate()
    {
        return $this->getEvent()->getOccurrenceDate();
    }
}
