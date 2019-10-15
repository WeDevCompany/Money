<?php

declare(strict_types=1);

namespace WeDev\Price\Infraestructure;

use Ds\Collection;
use Ds\Map;
use Ds\Set;

interface TypedCollectionInterface extends Collection, \Iterator, \ArrayAccess
{
    public function current();

    public function next();

    public function key();

    public function valid();

    public function rewind();

    public function offsetExists($offset);

    public function offsetGet($offset);

    public function offsetSet($offset, $value);

    public function offsetUnset($offset);

    public function clear();

    public function copy(): Collection;

    public function isEmpty(): bool;

    public function toArray(): array;

    public function toMap(): Map;

    public function toSet(): Set;

    public function jsonSerialize();

    public function count(): int;
}
