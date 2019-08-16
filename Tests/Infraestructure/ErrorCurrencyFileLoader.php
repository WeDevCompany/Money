<?php

declare(strict_types=1);

namespace WeDev\Price\Tests\Infraestructure;

use Ds\Map;
use WeDev\Price\Infraestructure\CurrencyFileLoaderInterface;

class ErrorCurrencyFileLoader implements CurrencyFileLoaderInterface
{
    public function getCurrency(): ?Map
    {
        // TODO: Implement getCurrency() method.
    }
}
