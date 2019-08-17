<?php

declare(strict_types=1);

namespace WeDev\Price\Domain;

class Money
{
    public $number;
    public $currency;

    public function __construct(Number $number, Currency $currency)
    {
        $this->number = $number;
        $this->currency = $currency;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getCurrency()
    {
        return $this->number;
    }

    public function equals(self $money)
    {
        return $this->getNumber()->equals($money->getNumber()) &&
            $this->getCurrency()->equals($money->getCurrency());
    }
}
