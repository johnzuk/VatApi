<?php
include '../vendor/autoload.php';

$api = new VatApi\VatApi();
$nip = 'xxxxxxxxxx';

try {
    $status = $api->getNipStatus($nip);

    if ($status === \VatApi\TaxStatusInterface::TAXPAYER_ACTIVE) {
        echo 'Podmiot o podanym identyfikatorze podatkowy NIP jest zarejestrowany jako podatnik VAT czynny';
    } else if ($status === \VatApi\TaxStatusInterface::TAXPAYER_NOT_ACTIVE) {
        echo 'Podmiot o podanym  identyfikatorze podatkowym NIP nie jest zarejestrowany jako podatnik VAT';
    } else {
        echo 'Podmiot o podanym identyfikatorze podatkowym NIP jest zarejestrowany jako podatnik VAT zwolniony';
    }
} catch (\VatApi\Exception\InvalidNipNumberException $e) {
    echo $e->getMessage();
} catch (\VatApi\Exception\InvalidCodeValueException $e) {
    echo 'Błąd odpowiedźi serwera';
}
