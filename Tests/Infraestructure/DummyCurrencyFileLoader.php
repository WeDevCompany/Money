<?php

declare(strict_types=1);

namespace WeDev\Price\Tests\Infraestructure;

use Ds\Map;
use WeDev\Price\Infraestructure\CurrencyFileLoaderInterface;

class DummyCurrencyFileLoader implements CurrencyFileLoaderInterface
{
    public function getCurrency(): ?Map
    {
        return new Map([]);
    }
}
