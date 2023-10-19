<?php

namespace VatApi;

use PHPUnit\Framework\TestCase;
use VatApi\Exception\InvalidCodeValueException;
use VatApi\Exception\InvalidNipNumberException;

class StatusDecoderTest extends TestCase
{
    public function testDecodeWithWalidResponse()
    {
        $response = new Type\Response\VatStatusResponse();
        $response->setKod('C');
        $status = StatusDecoder::decode($response);

        $this->assertEquals(TaxStatusInterface::TAXPAYER_ACTIVE, $status);
    }

    public function testDecodeWithInvalidNumber()
    {
        $this->expectException(InvalidNipNumberException::class);

        $response = new Type\Response\VatStatusResponse();
        $response->setKod('I');
        $response->setKomunikat('Niepoprawny Numer Identyfikacji Podatkowej');

        $status = StatusDecoder::decode($response);
    }

    public function testDecodeWithInvalidCode()
    {
        $this->expectException(InvalidCodeValueException::class);

        $response = new Type\Response\VatStatusResponse();
        $response->setKod('X');

        $status = StatusDecoder::decode($response);
    }
}
