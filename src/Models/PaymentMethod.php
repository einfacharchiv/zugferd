<?php

namespace einfachArchiv\ZUGFeRD\Models;

class PaymentMethod extends Model
{
    /**
     * The namespace.
     *
     * @var \einfachArchiv\ZUGFeRD\Schema\Namespaces
     */
    protected $namespace = parent::NAMESPACE_RAM;

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
     * @return string|null
     */
    public function typeCode()
    {
        return (string) $this->element->TypeCode ?: null;
    }

    /**
     * Returns the information.
     *
     * @return string|null
     */
    public function information()
    {
        return (string) $this->element->Information ?: null;
    }

    /**
     * Returns the financial account.
     *
     * @return \einfachArchiv\ZUGFeRD\Models\FinancialAccount
     */
    public function financialAccount()
    {
        if (is_null($this->financialAccount)) {
            $this->financialAccount = new FinancialAccount($this->element->PayeePartyCreditorFinancialAccount);
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
            $this->financialInstitution = new FinancialInstitution($this->element->PayeeSpecifiedCreditorFinancialInstitution);
        }

        return $this->financialInstitution;
    }
}
