<?php

namespace WeDev\Price\Domain;

interface CurrencyCodeISO4217Interface
{
    public function getCurrencyCodeISO4217(): string;

    public function equals(self $currencyCodeIso4217): bool;

    public function __invoke(): self;

    public function __toString(): string;
}
