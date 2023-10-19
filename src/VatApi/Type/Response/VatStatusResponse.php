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

    public function getKod(): string
    {
        return $this->Kod;
    }

    public function setKod(string $kod): void
    {
        $this->Kod = $kod;
    }

    public function getKomunikat(): string
    {
        return $this->Komunikat;
    }

    public function setKomunikat(string $komunikat): void
    {
        $this->Komunikat = $komunikat;
    }
}
