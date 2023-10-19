<?php

namespace VatApi;

use VatApi\Exception\InvalidCodeValueException;
use VatApi\Exception\InvalidNipNumberException;
use VatApi\Type\Response\VatStatusResponse;

class StatusDecoder
{
    public const STATUS_MAP = [
        'N' => TaxStatusInterface::TAXPAYER_NOT_ACTIVE,
        'C' => TaxStatusInterface::TAXPAYER_ACTIVE,
        'Z' => TaxStatusInterface::TAXPAYER_FREE,
    ];

    /**
     * @throws InvalidNipNumberException
     * @throws InvalidCodeValueException
     */
    public static function decode(VatStatusResponse $response): int
    {
        if ('I' === $response->getKod()) {
            throw new InvalidNipNumberException($response->getKomunikat());
        }

        if (isset(static::STATUS_MAP[$response->getKod()])) {
            return static::STATUS_MAP[$response->getKod()];
        }

        throw new InvalidCodeValueException(sprintf('Invalid response code: "%s"', $response->getKod()));
    }
}
