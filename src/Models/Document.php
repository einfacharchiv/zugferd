<?php

namespace einfachArchiv\ZUGFeRD\Models;

use einfachArchiv\ZUGFeRD\Schema\Namespaces;

class Document extends Model
{
    /**
     * The children's namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = Namespaces::RSM;

    /**
     * The context.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Context
     */
    protected $context;

    /**
     * The header.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Header
     */
    protected $header;

    /**
     * The trade.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Trade
     */
    protected $trade;

    /**
     * Returns the context.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Context
     */
    public function context()
    {
        if (is_null($this->context)) {
            $context = $this->children()->SpecifiedExchangedDocumentContext;

            $this->context = new Context($context);
        }

        return $this->context;
    }

    /**
     * Returns the header.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Header
     */
    public function header()
    {
        if (is_null($this->header)) {
            $header = $this->children()->HeaderExchangedDocument;

            $this->header = new Header($header);
        }

        return $this->header;
    }

    /**
     * Returns the trade.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Trade
     */
    public function trade()
    {
        if (is_null($this->trade)) {
            $trade = $this->children()->SpecifiedSupplyChainTradeTransaction;

            $this->trade = new Trade($trade);
        }

        return $this->trade;
    }
}
