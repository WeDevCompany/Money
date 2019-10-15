<?php

declare(strict_types=1);

namespace WeDev\Price\Domain;

final class Currency implements \JsonSerializable
{
    private $isoCode;

    private function __construct(CurrencyCodeISO4217 $isoCode)
    {
        $this->isoCode = $isoCode;
    }

    public static function fromIsoCode(string $isoCode): self
    {
        return new self(CurrencyCodeISO4217::fromIsoCode($isoCode));
    }

    public function getCode(): string
    {
        return $this->isoCode->__toString();
    }

    public function equals(Currency $other): bool
    {
        return $this->getCode() === $other->getCode();
    }

    public function __toString(): string
    {
        return $this->getCode();
    }

    public function jsonSerialize()
    {
        return json_encode($this->__toString());
    }
}
