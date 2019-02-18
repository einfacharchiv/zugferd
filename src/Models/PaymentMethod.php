<?php

namespace einfachArchiv\ZUGFeRD\Models;

class PaymentMethod extends Model
{
    /**
     * The financial account.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\FinancialAccount
     */
    protected $financialAccount;

    /**
     * The financial institution.
     *
     * @var \einfachArchiv\ZUGFeRD\Models\FinancialInstitution
     */
    protected $financialInstitution;

    /**
     * Returns the type code.
     *
     * @return string
     */
    public function typeCode()
    {
        return (string) $this->children()->TypeCode;
    }

    /**
     * Returns the information.
     *
     * @return string
     */
    public function information()
    {
        return (string) $this->children()->Information;
    }

    /**
     * Returns the financial account.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\FinancialAccount
     */
    public function financialAccount()
    {
        if (is_null($this->financialAccount)) {
            $financialAccount = $this->children()->PayeePartyCreditorFinancialAccount;

            $this->financialAccount = new FinancialAccount($financialAccount);
        }

        return $this->financialAccount;
    }

    /**
     * Returns the financial institution.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\FinancialInstitution
     */
    public function financialInstitution()
    {
        if (is_null($this->financialInstitution)) {
            $financialInstitution = $this->children()->PayeeSpecifiedCreditorFinancialInstitution;

            $this->financialInstitution = new FinancialInstitution($financialInstitution);
        }

        return $this->financialInstitution;
    }
}
