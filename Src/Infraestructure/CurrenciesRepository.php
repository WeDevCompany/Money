<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Domain\Currency;

interface CurrenciesRepository
{
    public function getAll(): Ds\Map;

    public function findByIsoCode4217(string $isoCode): ?Currency;
}
