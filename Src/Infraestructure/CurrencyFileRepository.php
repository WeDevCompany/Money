<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Domain\Currency;

class CurrencyFileRepository implements CurrenciesRepositoryInterface
{
    private $currency_list;

    public function __construct()
    {
        $this->currency_list = (new CurrencyFileLoader(null))->getCurrency();
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function findByIsoCode4217(string $isoCode): ?Currency
    {
        // TODO: Implement findByIsoCode4217() method.
    }
}
