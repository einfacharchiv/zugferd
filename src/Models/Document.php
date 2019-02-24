<?php

namespace einfachArchiv\ZUGFeRD\Models;

class Document extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RSM;

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
    public function getContext()
    {
        if (is_null($this->context)) {
            $this->context = new Context($this->element->SpecifiedExchangedDocumentContext);
        }

        return $this->context;
    }

    /**
     * Returns the header.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Header
     */
    public function getHeader()
    {
        if (is_null($this->header)) {
            $this->header = new Header($this->element->HeaderExchangedDocument);
        }

        return $this->header;
    }

    /**
     * Returns the trade.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Trade
     */
    public function getTrade()
    {
        if (is_null($this->trade)) {
            $this->trade = new Trade($this->element->SpecifiedSupplyChainTradeTransaction);
        }

        return $this->trade;
    }
}
