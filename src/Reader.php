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
    public function getDocument()
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
    public function getContext()
    {
        return $this->getDocument()->getContext();
    }

    /**
     * Returns the type.
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->getContext()->getType();
    }

    /**
     * Returns the header.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Header
     */
    public function getHeader()
    {
        return $this->getDocument()->getHeader();
    }

    /**
     * Returns the id.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->getHeader()->getId();
    }

    /**
     * Returns the name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getHeader()->getName();
    }

    /**
     * Returns the type code.
     *
     * @return string|null
     */
    public function getTypeCode()
    {
        return $this->getHeader()->getTypeCode();
    }

    /**
     * Returns the issue date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function getIssueDate()
    {
        return $this->getHeader()->getIssueDate();
    }

    /**
     * Returns the notes.
     *
     * @return array
     */
    public function getNotes()
    {
        return $this->getHeader()->getNotes();
    }

    /**
     * Returns the trade.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Trade
     */
    public function getTrade()
    {
        return $this->getDocument()->getTrade();
    }

    /**
     * Returns the agreement.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Agreement
     */
    public function getAgreement()
    {
        return $this->getTrade()->getAgreement();
    }

    /**
     * Returns the seller.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    public function getSeller()
    {
        return $this->getAgreement()->getSeller();
    }

    /**
     * Returns the buyer.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\TradeParty
     */
    public function getBuyer()
    {
        return $this->getAgreement()->getBuyer();
    }

    /**
     * Returns the delivery.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Delivery
     */
    public function getDelivery()
    {
        return $this->getTrade()->getDelivery();
    }

    /**
     * Returns the occurrence date.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Date
     */
    public function getOccurrenceDate()
    {
        return $this->getDelivery()->getOccurrenceDate();
    }

    /**
     * Returns the settlement.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Settlement
     */
    public function getSettlement()
    {
        return $this->getTrade()->getSettlement();
    }

    /**
     * Returns the payment reference.
     *
     * @return string|null
     */
    public function getPaymentReference()
    {
        return $this->getSettlement()->getPaymentReference();
    }

    /**
     * Returns the currency.
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->getSettlement()->getCurrency();
    }

    /**
     * Returns the payment methods.
     *
     * @return array
     */
    public function getPaymentMethods()
    {
        return $this->getSettlement()->getPaymentMethods();
    }

    /**
     * Returns the taxes.
     *
     * @return array
     */
    public function getTaxes()
    {
        return $this->getSettlement()->getTaxes();
    }

    /**
     * Returns the amounts.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amounts
     */
    public function getAmounts()
    {
        return $this->getSettlement()->getAmounts();
    }

    /**
     * Returns the line total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getLineTotal()
    {
        return $this->getAmounts()->getLineTotal();
    }

    /**
     * Returns the charge total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getChargeTotal()
    {
        return $this->getAmounts()->getChargeTotal();
    }

    /**
     * Returns the allowance total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getAllowanceTotal()
    {
        return $this->getAmounts()->getAllowanceTotal();
    }

    /**
     * Returns the tax basis total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getTaxBasisTotal()
    {
        return $this->getAmounts()->getTaxBasisTotal();
    }

    /**
     * Returns the tax total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getTaxTotal()
    {
        return $this->getAmounts()->getTaxTotal();
    }

    /**
     * Returns the grand total.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getGrandTotal()
    {
        return $this->getAmounts()->getGrandTotal();
    }

    /**
     * Returns the total prepaid.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getTotalPrepaid()
    {
        return $this->getAmounts()->getTotalPrepaid();
    }

    /**
     * Returns the total allowance charge.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getTotalAllowanceCharge()
    {
        return $this->getAmounts()->getTotalAllowanceCharge();
    }

    /**
     * Returns the due payable.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\Amount
     */
    public function getDuePayable()
    {
        return $this->getAmounts()->getDuePayable();
    }

    /**
     * Returns the payment terms.
     *
     * @return array
     */
    public function getPaymentTerms()
    {
        return $this->getSettlement()->getPaymentTerms();
    }
}
