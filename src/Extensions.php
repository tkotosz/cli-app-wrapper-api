<?php

namespace Tkotosz\CliAppWrapperApi;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

class Extensions implements IteratorAggregate
{
    /** @var Extension[] */
    private $items;

    /**
     * @param Extension[] $items
     *
     * @return self
     */
    public static function fromItems(array $items): self
    {
        return new self($items);
    }

    /**
     * @return Extension[]
     */
    public function items(): array
    {
        return $this->items;
    }

    /**
     * @return Traversable|Extension[]
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
