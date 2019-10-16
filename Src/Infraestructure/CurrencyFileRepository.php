<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use WeDev\Price\Domain\Currency;

class CurrencyFileRepository implements CurrenciesRepositoryInterface
{
    private $currency_list;

    public function __construct()
    {
        $currency_list = [];
        foreach ((new CurrencyFileLoader(null))->getCurrency() as $iso_code) {
            array_push($currency_list, Currency::fromIsoCode($iso_code));
        }

        $list = CurrencyCollection::fromArray($currency_list);
        $this->currency_list = (new CurrencyFileLoader(null))->getCurrency();
    }

    public function getAll()
    {
    }

    public function findByIsoCode4217(string $isoCode): ?Currency
    {
        // TODO: Implement findByIsoCode4217() method.
    }
}
