<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Domain\Currency;

interface CurrenciesRepositoryInterface
{
    public function getAll();

    public function findByIsoCode4217(string $isoCode): ?Currency;
}
