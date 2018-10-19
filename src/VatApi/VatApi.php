<?php
namespace VatApi;

use VatApi\Exception\InvalidCodeValueException;
use VatApi\Exception\InvalidNipNumberException;

class VatApi
{
    /**
     * @var \SoapClient
     */
    protected $soapClient;

    /**
     * VatApi constructor.
     * @param \SoapClient $soapClient
     */
    public function __construct(?\SoapClient $soapClient = null)
    {
        $this->soapClient = $soapClient ?? new \SoapClient(
            VatApiConstantInterface::WSDL_ADDRESS,
            VatApiConstantInterface::DEFAULT_API_OPTIONS
        );
    }

    /**
     * @param string $nipNumber
     * @return int
     * @throws InvalidNipNumberException
     * @throws InvalidCodeValueException
     */
    public function getNipStatus(string $nipNumber): int
    {
        $response = $this->soapClient->__soapCall(VatApiConstantInterface::CHECK_NIP_FUNCTION, [
            VatApiConstantInterface::NIP_CHECK_PARAM => $nipNumber
        ]);

        return StatusDecoder::decode($response);
    }
}
