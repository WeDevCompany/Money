<?php

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Domain\Currency;
use WeDev\Price\Domain\CurrencyCodeISO4217Interface;

interface CurrenciesRepository
{
    public function getAll(): Ds\Map;

    public function findByIsoCode4217(CurrencyCodeISO4217Interface $isoCode): ?Currency;
}
