<?php

namespace WeDev\Price\Domain;

use WeDev\Price\Domain\Exceptions\SymbolInvalidArgument;

class CurrencySymbol
{
    private const SYMBOL_REGEX = '/^(\p{Sc}?\d*)((\.|,)\d\d\d)?\d*$/mu';

    private $symbol;

    private function __construct(string $symbol)
    {
        $this->setSymbol($symbol);
    }

    private function setSymbol(string $symbol)
    {
        if (!$this->validateSymbol($symbol)) {
            throw new SymbolInvalidArgument(
                sprintf('Invalid symbol %1$s. Is not a valid symbol', $symbol)
            );
        }

        $this->symbol = $symbol;
    }

    private function validateSymbol(string $symbol): bool
    {
        try {
            $symbol = (string) $symbol;
        } catch (\Exception $e) {
            throw new SymbolInvalidArgument(
                sprintf('Invalid symbol %1$s. Is not a valid symbol', $symbol)
            );
        }

        return (bool) preg_match_all(self::SYMBOL_REGEX, $symbol, $matches, PREG_SET_ORDER, 0);
    }

    public function __toString()
    {
        return $this->symbol;
    }
}
