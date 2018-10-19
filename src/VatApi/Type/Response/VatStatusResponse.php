<?php
namespace VatApi\Type\Response;

class VatStatusResponse
{
    /**
     * @var string
     */
    public $Kod;

    /**
     * @var string
     */
    public $Komunikat;

    /**
     * @return string
     */
    public function getKod(): string
    {
        return $this->Kod;
    }

    /**
     * @param string $kod
     */
    public function setKod(string $kod): void
    {
        $this->Kod = $kod;
    }

    /**
     * @return string
     */
    public function getKomunikat(): string
    {
        return $this->Komunikat;
    }

    /**
     * @param string $komunikat
     */
    public function setKomunikat(string $komunikat): void
    {
        $this->Komunikat = $komunikat;
    }
}
