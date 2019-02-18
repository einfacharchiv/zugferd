# Convert ZUGFeRD XML to PHP objects

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package provides an easy way to convert a ZUGFeRD-invoice.xml to a PHP object.

## Requirements

PHP 7.0 and later.

## Installation

You can install this package via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require einfacharchiv/zugferd
```

## Usage

```php
$xml = file_get_contents('path/to/ZUGFeRD-invoice.xml');

// Validates the XML against the ZUGFeRD XSD.
if (\einfachArchiv\ZUGFeRD\Validator::isValid($xml)) {
    $reader = new \einfachArchiv\ZUGFeRD\Reader($xml);

    // Available methods
    // Context
    $reader->type();

    // Header
    $reader->id();
    $reader->name();
    $reader->typeCode();
    
    $reader->issueDate()->date();
    $reader->issueDate()->format();

    foreach ($reader->notes() as $note) {
        $note->note();
    }

    // Seller
    $reader->seller()->name();
    $reader->seller()->address()->lineOne();
    $reader->seller()->address()->lineTwo();
    $reader->seller()->address()->zip();
    $reader->seller()->address()->city();
    $reader->seller()->address()->country();

    foreach ($reader->seller()->taxNumbers() as $taxNumber) {
        $taxNumber->number();
        $taxNumber->type();
    }

    // Buyer
    $reader->buyer()->name();
    $reader->buyer()->address()->lineOne();
    $reader->buyer()->address()->lineTwo();
    $reader->buyer()->address()->zip();
    $reader->buyer()->address()->city();
    $reader->buyer()->address()->country();

    foreach ($reader->buyer()->taxNumbers() as $taxNumber) {
        $taxNumber->number();
        $taxNumber->type();
    }

    // Delivery
    $reader->occurrenceDate()->date();
    $reader->occurrenceDate()->format();

    // Settlement
    $reader->paymentReference();
    $reader->currency();

    foreach ($reader->paymentMethods() as $paymentMethod) {
        $paymentMethod->typeCode();
        $paymentMethod->information();

        $paymentMethod->financialAccount()->iban();
        $paymentMethod->financialAccount()->name();
        $paymentMethod->financialAccount()->id();
        
        $paymentMethod->financialInstitution()->bic();
        $paymentMethod->financialInstitution()->name();
    }

    foreach ($reader->taxes() as $tax) {
        $tax->tax()->amount();
        $tax->tax()->currency();

        $tax->typeCode();
        
        $tax->basisAmount()->amount();
        $tax->basisAmount()->currency();
        
        $tax->categoryCode();
        $tax->percentage();
    }

    $reader->amounts()->lineTotal()->amount();
    $reader->amounts()->lineTotal()->currency();

    $reader->amounts()->chargeTotal()->amount();
    $reader->amounts()->chargeTotal()->currency();

    $reader->amounts()->allowanceTotal()->amount();
    $reader->amounts()->allowanceTotal()->currency();

    $reader->amounts()->taxBasisTotal()->amount();
    $reader->amounts()->taxBasisTotal()->currency();

    $reader->amounts()->taxTotal()->amount();
    $reader->amounts()->taxTotal()->currency();

    $reader->amounts()->grandTotal()->amount();
    $reader->amounts()->grandTotal()->currency();

    $reader->amounts()->totalPrepaid()->amount();
    $reader->amounts()->totalPrepaid()->currency();

    $reader->amounts()->totalAllowanceCharge()->amount();
    $reader->amounts()->totalAllowanceCharge()->currency();

    $reader->amounts()->duePayable()->amount();
    $reader->amounts()->duePayable()->currency();

    foreach ($reader->paymentTerms() as $paymentTerms) {
        $paymentTerms->description();

        $paymentTerms->dueDate()->date();
        $paymentTerms->dueDate()->format();
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
