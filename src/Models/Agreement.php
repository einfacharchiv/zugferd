<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Agreement extends Model
{
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
    public function seller()
    {
        if (is_null($this->seller)) {
            $seller = $this->children()->SellerTradeParty;

            $this->seller = new TradeParty($seller);
        }

        return $this->seller;
    }

    /**
     * Returns the buyer.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    public function buyer()
    {
        if (is_null($this->buyer)) {
            $buyer = $this->children()->BuyerTradeParty;

            $this->buyer = new TradeParty($buyer);
        }

        return $this->buyer;
    }
}
