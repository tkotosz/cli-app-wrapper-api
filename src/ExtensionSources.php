<?php

namespace Tkotosz\CliAppWrapperApi;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class ExtensionSources implements IteratorAggregate
{
    /** @var ExtensionSource[] */
    private $items;

    /**
     * @param ExtensionSource[] $items
     *
     * @return self
     */
    public static function fromItems(array $items): self
    {
        return new self($items);
    }

    /**
     * @return ExtensionSource[]
     */
    public function items(): array
    {
        return $this->items;
    }

    /**
     * @return Traversable|ExtensionSource[]
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    private function __construct(array $items)
    {
        $this->items = $items;
    }
}
