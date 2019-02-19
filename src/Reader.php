<?php

namespace einfachArchiv\ZUGFeRD;

use einfachArchiv\ZUGFeRD\Models\Document;

class Reader
{
    /**
     * The XML.
     *
     * @var string
     */
    protected $xml;

    /**
     * The document.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\Document
     */
    protected $document;

    /**
     * @param string $xml The XML
     */
    public function __construct($xml)
    {
        $this->xml = $xml;
    }

    /**
     * Returns the document.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Document
     */
    public function document()
    {
        if (is_null($this->document)) {
            $this->document = new Document($this->xml);
        }

        return $this->document;
    }

    /**
     * Returns the context.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Context
     */
    public function context()
    {
        return $this->document()->context();
    }

    /**
     * Returns the type.
     *
     * @return string|null
     */
    public function type()
    {
        return $this->context()->type();
    }

    /**
     * Returns the header.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Header
     */
    public function header()
    {
        return $this->document()->header();
    }

    /**
     * Returns the id.
     *
     * @return string|null
     */
    public function id()
    {
        return $this->header()->id();
    }

    /**
     * Returns the name.
     *
     * @return string|null
     */
    public function name()
    {
        return $this->header()->name();
    }

    /**
     * Returns the type code.
     *
     * @return string|null
     */
    public function typeCode()
    {
        return $this->header()->typeCode();
    }

    /**
     * Returns the issue date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function issueDate()
    {
        return $this->header()->issueDate();
    }

    /**
     * Returns the notes.
     *
     * @return array
     */
    public function notes()
    {
        return $this->header()->notes();
    }

    /**
     * Returns the trade.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Trade
     */
    public function trade()
    {
        return $this->document()->trade();
    }

    /**
     * Returns the agreement.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Agreement
     */
    public function agreement()
    {
        return $this->trade()->agreement();
    }

    /**
     * Returns the seller.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    public function seller()
    {
        return $this->agreement()->seller();
    }

    /**
     * Returns the buyer.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    public function buyer()
    {
        return $this->agreement()->buyer();
    }

    /**
     * Returns the delivery.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Delivery
     */
    public function delivery()
    {
        return $this->trade()->delivery();
    }

    /**
     * Returns the occurrence date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function occurrenceDate()
    {
        return $this->delivery()->occurrenceDate();
    }

    /**
     * Returns the settlement.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Settlement
     */
    public function settlement()
    {
        return $this->trade()->settlement();
    }

    /**
     * Returns the payment reference.
     *
     * @return string|null
     */
    public function paymentReference()
    {
        return $this->settlement()->paymentReference();
    }

    /**
     * Returns the currency.
     *
     * @return string|null
     */
    public function currency()
    {
        return $this->settlement()->currency();
    }

    /**
     * Returns the payment methods.
     *
     * @return array
     */
    public function paymentMethods()
    {
        return $this->settlement()->paymentMethods();
    }

    /**
     * Returns the taxes.
     *
     * @return array
     */
    public function taxes()
    {
        return $this->settlement()->taxes();
    }

    /**
     * Returns the amounts.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amounts
     */
    public function amounts()
    {
        return $this->settlement()->amounts();
    }

    /**
     * Returns the payment terms.
     *
     * @return array
     */
    public function paymentTerms()
    {
        return $this->settlement()->paymentTerms();
    }
}
