<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Trade extends Model
{
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
            $agreement = $this->children()->ApplicableSupplyChainTradeAgreement;

            $this->agreement = new Agreement($agreement);
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
            $delivery = $this->children()->ApplicableSupplyChainTradeDelivery;

            $this->delivery = new Delivery($delivery);
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
            $settlement = $this->children()->ApplicableSupplyChainTradeSettlement;

            $this->settlement = new Settlement($settlement);
        }

        return $this->settlement;
    }
}
