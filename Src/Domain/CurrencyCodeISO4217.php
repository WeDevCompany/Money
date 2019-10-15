<?php

declare(strict_types=1);

namespace WeDev\Price\Domain;

use WeDev\Price\Domain\Exceptions\CurrencyCodeISO4217InvalidArgument;

class CurrencyCodeISO4217
{
    private const VALIDATOR_REGEX = '/^[A-Z]{3}$/m';

    private $code;

    private function __construct(string $code)
    {
        $this->setCode($code);
    }

    public static function fromIsoCode(string $code): self
    {
        return new self($code);
    }

    private function setCode(string $code): void
    {
        if (!$this->validCurrencyCode($code)) {
            throw new CurrencyCodeISO4217InvalidArgument('The currency code with ISO4217 is not well formatted');
        }
        $this->code = $code;
    }

    public function getCurrencyCodeISO4217(): string
    {
        return $this->__toString();
    }

    public function equals(CurrencyCodeISO4217Interface $currencyCodeIso4217): bool
    {
        return $this->code === $currencyCodeIso4217->getCurrencyCodeISO4217();
    }

    public function __invoke(): CurrencyCodeISO4217Interface
    {
        return new self($this->code);
    }

    public function __toString(): string
    {
        return $this->code;
    }

    private function validCurrencyCode(string $currencyCode): bool
    {
        return (bool) preg_match_all(self::VALIDATOR_REGEX, $currencyCode, $matches, PREG_SET_ORDER, 0);
    }
}
