<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

interface CurrencyFileLoaderInterface
{
    public function getCurrency(): ?CurrencyCollection;
}
