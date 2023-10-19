<?php

namespace VatApi;

use VatApi\Type\Response\VatStatusResponse;

interface VatApiConstantInterface
{
    public const WSDL_ADDRESS = 'https://sprawdz-status-vat.mf.gov.pl/?wsdl';

    public const CHECK_NIP_FUNCTION = 'SprawdzNIP';

    public const VAT_RESPONSE = 'TWynikWeryfikacjiVAT';

    public const NIP_CHECK_PARAM = 'NIP';

    public const DEFAULT_API_OPTIONS = [
        'classmap' => [
            VatApiConstantInterface::VAT_RESPONSE => VatStatusResponse::class,
        ],
    ];
}
