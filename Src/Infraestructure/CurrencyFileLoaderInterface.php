<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use Ds\Map;

interface CurrencyFileLoaderInterface
{
    public function getCurrency(): ?Map;
}
