<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use Ds\Collection;
use Ds\Map;
use Ds\Set;
use WeDev\Price\Domain\Currency;

class CurrencyCollection implements TypedCollectionInterface
{
    private $values = [];
    private $position = 0;

    private function __construct(Currency ...$values)
    {
        foreach ($values as $value) {
            $this->offsetSet('', $value);
        }
    }

    public static function fromArray(array $values)
    {
        $currency_list = [];
        if (!empty($values)) {
            $currency_list = new self(array_shift($values));
        }

        foreach ($values as $currency) {
            $currency_list->push($currency);
        }

        return $currency_list;
    }

    public function current(): Currency
    {
        return $this->values[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->values[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->values[$offset]);
    }

    public function offsetGet($offset): Currency
    {
        return $this->values[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (empty($offset)) { //this happens when you do $collection[] = 1;
            $this->values[] = $value;
        } else {
            $this->values[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->values[$offset]);
    }

    public function clear()
    {
        $this->values = $this->values = [];
    }

    public function copy(): Collection
    {
        return new self($this->values);
    }

    public function isEmpty(): bool
    {
        return empty($this->values);
    }

    public function toArray(): array
    {
        return $this->values;
    }

    public function toMap(): Map
    {
        return new Map($this->values);
    }

    public function toSet(): Set
    {
        return new Set($this->values);
    }

    public function jsonSerialize()
    {
        return json_encode(array_values($this->values));
    }

    public function count(): int
    {
        return count($this->values);
    }

    public function push(Currency $currency)
    {
        array_push($this->values, $currency);
    }

    public function shift(): Currency
    {
        ($this->position > 0) ? --$this->position : $this->position = 0;

        return array_shift($this->values);
    }
}
