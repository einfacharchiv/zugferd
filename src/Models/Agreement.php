<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Agreement extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

    /**
     * The seller.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    protected $seller;

    /**
     * The buyer.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    protected $buyer;

    /**
     * Returns the seller.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    public function getSeller()
    {
        if (is_null($this->seller)) {
            $this->seller = new TradeParty($this->element->SellerTradeParty);
        }

        return $this->seller;
    }

    /**
     * Returns the buyer.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    public function getBuyer()
    {
        if (is_null($this->buyer)) {
            $this->buyer = new TradeParty($this->element->BuyerTradeParty);
        }

        return $this->buyer;
    }
}
