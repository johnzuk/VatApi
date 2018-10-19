<?php
namespace VatApi;

use PHPUnit\Framework\TestCase;

class StatusDecoderTest extends TestCase
{

    public function testDecodeWithWalidResponse()
    {
        $response = new Type\Response\VatStatusResponse();
        $response->setKod('C');
        $status = StatusDecoder::decode($response);

        $this->assertEquals(TaxStatusInterface::TAXPAYER_ACTIVE, $status);
    }

    /**
     * @expectedException VatApi\Exception\InvalidNipNumberException
     */
    public function testDecodeWithInvalidNumber()
    {
        $response = new Type\Response\VatStatusResponse();
        $response->setKod('I');
        $response->setKomunikat('Niepoprawny Numer Identyfikacji Podatkowej');

        $status = StatusDecoder::decode($response);
    }

    /**
     * @expectedException VatApi\Exception\InvalidCodeValueException
     */
    public function testDecodeWithInvalidCode()
    {
        $response = new Type\Response\VatStatusResponse();
        $response->setKod('X');

        $status = StatusDecoder::decode($response);
    }
}
