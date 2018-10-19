<?php
namespace VatApi;

use PHPUnit\Framework\TestCase;

class VatApiTest extends TestCase
{
    public function testGetNipStatus()
    {
        $response = new Type\Response\VatStatusResponse();
        $response->setKod('N');
        $response->setKomunikat('test');

        $client = $this->createMock(\SoapClient::class);
        $client
            ->expects($this->once())
            ->method('__soapCall')
            ->with(VatApiConstantInterface::CHECK_NIP_FUNCTION, [
                VatApiConstantInterface::NIP_CHECK_PARAM => '1231231223'
            ])
            ->willReturn($response);

        $api = new VatApi($client);
        $api->getNipStatus('1231231223');
    }
}
