<?php
namespace VatApi\Integration;

use PHPUnit\Framework\TestCase;
use VatApi\TaxStatusInterface;
use VatApi\VatApi;

class VatApiTest extends TestCase
{
    public function testGetNipStatusWithValidNip()
    {
        $api = new VatApi();
        $response = $api->getNipStatus('7770020640');

        $this->assertEquals(TaxStatusInterface::TAXPAYER_ACTIVE, $response);
    }

    /**
     * @expectedException VatApi\Exception\InvalidNipNumberException
     */
    public function testGetNipStatuwWithInvalidNip()
    {
        $api = new VatApi();
        $response = $api->getNipStatus('1231231221');

        $this->assertEquals(TaxStatusInterface::TAXPAYER_ACTIVE, $response);
    }
}
