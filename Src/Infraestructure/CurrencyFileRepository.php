<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Domain\Currency;
use Ds\Map;

class CurrencyFileRepository implements CurrenciesRepository
{
    private $currency_list;

    public function __construct()
    {
    }

    public function getAll(): Map
    {
        // TODO: Implement getAll() method.
    }

    public function findByIsoCode4217(string $isoCode): ?Currency
    {
        // TODO: Implement findByIsoCode4217() method.
    }
}
