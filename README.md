PHP VAT API library
===================
[![Packagist](https://img.shields.io/packagist/l/gusapi/gusapi.svg)](https://packagist.org/packages/vat-api/vat-api)
[![Build Status](https://travis-ci.org/johnzuk/GusApi.svg?branch=master)](https://travis-ci.org/johnzuk/VatApi)
[![Codecov](https://img.shields.io/codecov/c/github/johnzuk/GusApi/master.svg)](https://codecov.io/gh/johnzuk/VatApi)
[![Packagist](https://img.shields.io/packagist/v/gusapi/gusapi.svg)](https://packagist.org/packages/vat-api/vat-api)
[![Packagist](https://img.shields.io/packagist/dt/gusapi/gusapi.svg)](https://packagist.org/packages/vat-api/vat-api)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/johnzuk/GusApi/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/johnzuk/VatApi/?branch=master)

PHP VAT API is an object-oriented library to get information from [mf.gov.pl](https://sprawdz-status-vat.mf.gov.pl/) based on **official** Ministerstwo Finansów SOAP API.
Official docs [here](https://www.finanse.mf.gov.pl/c/document_library/get_file?uuid=fba25e1b-68dc-4f59-8193-323046002134&groupId=766655).

Example
======================

```php
include '../vendor/autoload.php';

$api = new VatApi\VatApi();
$nip = 'xxxxxxxxxx';

try {
    $status = $api->getNipStatus($nip);

    if ($status === \VatApi\TaxStatusInterface::TAXPAYER_ACTIVE) {
        echo 'Podmiot o podanym identyfikatorze podatkowy NIP jest zarejestrowany jako podatnik VAT czynny';
    } else if ($status === \VatApi\TaxStatusInterface::TAXPAYER_NOT_ACTIVE) {
        echo 'Podmiot o podanym  identyfikatorze podatkowym NIP nie jest zarejestrowany jako podatnik VAT';
    } else if ($status === \VatApi\TaxStatusInterface::TAXPAYER_FREE) {
        echo 'Podmiot o podanym identyfikatorze podatkowym NIP jest zarejestrowany jako podatnik VAT zwolniony';
    }
} catch (\VatApi\Exception\InvalidNipNumberException $e) {
    echo $e->getMessage();
} catch (\VatApi\Exception\InvalidCodeValueException $e) {
    echo 'Błąd odpowiedźi serwera';
}

```