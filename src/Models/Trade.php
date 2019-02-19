<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Trade extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * The agreement.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Agreement
     */
    protected $agreement;

    /**
     * The delivery.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Delivery
     */
    protected $delivery;

    /**
     * The settlement.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Settlement
     */
    protected $settlement;

    /**
     * Returns the agreement.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Agreement
     */
    public function agreement()
    {
        if (is_null($this->agreement)) {
            $this->agreement = new Agreement($this->element->ApplicableSupplyChainTradeAgreement);
        }

        return $this->agreement;
    }

    /**
     * Returns the delivery.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Delivery
     */
    public function delivery()
    {
        if (is_null($this->delivery)) {
            $this->delivery = new Delivery($this->element->ApplicableSupplyChainTradeDelivery);
        }

        return $this->delivery;
    }

    /**
     * Returns the settlement.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Settlement
     */
    public function settlement()
    {
        if (is_null($this->settlement)) {
            $this->settlement = new Settlement($this->element->ApplicableSupplyChainTradeSettlement);
        }

        return $this->settlement;
    }
}
