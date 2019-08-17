<?php

declare(strict_types=1);

namespace WeDev\Price\Domain;

class MoneyFactory
{
    public static function __callStatic($method, $amount): Money
    {
        return new Money(Number::fromNumber($amount[0]), Currency::fromIsoCode($method));
    }
}
