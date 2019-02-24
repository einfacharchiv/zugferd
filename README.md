# Convert ZUGFeRD XML to PHP objects

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package provides an easy way to convert a ZUGFeRD-invoice.xml to a PHP object.

You can use the [unpack-pdf-attachments package](https://github.com/einfachArchiv/unpack-pdf-attachments) to unpack a ZUGFeRD-invoice.xml from a PDF.

We use both packages in our German SaaS product [einfachArchiv](https://www.einfacharchiv.com).

## Requirements

PHP 7.0 and later.

## Installation

You can install this package via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require einfacharchiv/zugferd
```

## Usage

Converting a ZUGFeRD XML is easy.

If an element is not present, the method returns `null`.

```php
$xml = file_get_contents('path/to/ZUGFeRD-invoice.xml');

// Validates the XML against the ZUGFeRD XSD.
if (Validator::isValid($xml)) {
    $reader = new Reader($xml);

    // Available methods
    // Context
    $reader->getType();

    // Header
    $reader->getId();
    $reader->getName();
    $reader->getTypeCode();
    $reader->getIssueDate()->toDateTimeString();

    foreach ($reader->getNotes() as $note) {
        $note->getNote();
    }

    // Seller
    $reader->getSeller()->getName();
    $reader->getSeller()->getLineOne();
    $reader->getSeller()->getLineTwo();
    $reader->getSeller()->getZip();
    $reader->getSeller()->getCity();
    $reader->getSeller()->getCountry();

    foreach ($reader->getSeller()->getTaxNumbers() as $taxNumber) {
        $taxNumber->getNumber();
        $taxNumber->getType();
    }

    // Buyer
    $reader->getBuyer()->getId();
    $reader->getBuyer()->getName();
    $reader->getBuyer()->getLineOne();
    $reader->getBuyer()->getLineTwo();
    $reader->getBuyer()->getZip();
    $reader->getBuyer()->getCity();
    $reader->getBuyer()->getCountry();

    foreach ($reader->getBuyer()->getTaxNumbers() as $taxNumber) {
        $taxNumber->getNumber();
        $taxNumber->getType();
    }

    // Delivery
    $reader->getOccurrenceDate()->toDateTimeString();

    // Settlement
    $reader->getPaymentReference();
    $reader->getCurrency();

    foreach ($reader->getPaymentMethods() as $paymentMethod) {
        $paymentMethod->getTypeCode();
        $paymentMethod->getInformation();

        $paymentMethod->getFinancialAccount()->getIban();
        $paymentMethod->getFinancialAccount()->getName();
        $paymentMethod->getFinancialAccount()->getId();
        
        $paymentMethod->getFinancialInstitution()->getBic();
        $paymentMethod->getFinancialInstitution()->getName();
    }

    foreach ($reader->getTaxes() as $tax) {
        $tax->getTax()->getAmount();
        $tax->getTax()->getCurrency();

        $tax->getTypeCode();
        
        $tax->getBasisAmount()->getAmount();
        $tax->getBasisAmount()->getCurrency();
        
        $tax->getCategoryCode();
        $tax->getPercentage();
    }

    $reader->getLineTotal()->getAmount();
    $reader->getLineTotal()->getCurrency();

    $reader->getChargeTotal()->getAmount();
    $reader->getChargeTotal()->getCurrency();

    $reader->getAllowanceTotal()->getAmount();
    $reader->getAllowanceTotal()->getCurrency();

    $reader->getTaxBasisTotal()->getAmount();
    $reader->getTaxBasisTotal()->getCurrency();

    $reader->getTaxTotal()->getAmount();
    $reader->getTaxTotal()->getCurrency();

    $reader->getGrandTotal()->getAmount();
    $reader->getGrandTotal()->getCurrency();

    $reader->getTotalPrepaid()->getAmount();
    $reader->getTotalPrepaid()->getCurrency();

    $reader->getTotalAllowanceCharge()->getAmount();
    $reader->getTotalAllowanceCharge()->getCurrency();

    $reader->getDuePayable()->getAmount();
    $reader->getDuePayable()->getCurrency();

    foreach ($reader->getPaymentTerms() as $paymentTerms) {
        $paymentTerms->getDescription();
        $paymentTerms->getDueDate()->toDateTimeString();
    }
}
```

## Contributing
Contributions are **welcome**.

We accept contributions via Pull Requests on [Github](https://github.com/einfachArchiv/zugferd).

Find yourself stuck using the package? Found a bug? Do you have general questions or suggestions for improvement? Feel free to [create an issue on GitHub](https://github.com/einfachArchiv/zugferd/issues), we'll try to address it as soon as possible.

If you've found a security issue, please email [support@einfacharchiv.com](mailto:support@einfacharchiv.com) instead of using the issue tracker.

**Happy coding**!

## Credits

- [Philip Günther](https://github.com/Pag-Man)
- [All Contributors](https://github.com/einfachArchiv/zugferd/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
