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

    public static function fromMoney(Number $number): self
    {
        return new self (
            $number,
            Currency::fromIsoCode(Constants::DEFAULT_CURRENCY)
        );
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function increaseAmountBy($amount)
    {
        return new self(
            $this->getNumber()->add($amount),
            $this->getCurrency()
        );
    }

    public function decreaseAmountBy($amount)
    {
        return new self(
            $this->getNumber()->substract($amount),
            $this->getCurrency()
        );
    }

    public function multiplyAmountBy($amount)
    {
        return new self(
            $this->getNumber()->multiply($amount),
            $this->getCurrency()
        );
    }

    public function divideAmountBy($amount)
    {
        return new self(
            $this->getNumber()->divide($amount),
            $this->getCurrency()
        );
    }

    public function __toString()
    {
        return 'Number=' . $this->getNumber().__toString()
            . ", Currency=" . $this->getCurrency().__toString();
    }

    public function equals(self $money)
    {
        return $this->getNumber()->equals($money->getNumber()) &&
            $this->getCurrency()->equals($money->getCurrency());
    }
}
