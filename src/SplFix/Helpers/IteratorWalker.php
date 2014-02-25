<?php

namespace MeadSteve\SplFix\Helpers;


class IteratorWalker
{
    /**
     * @var \Iterator
     */
    protected $iterator;

    function __construct(\Iterator $iterator)
    {
        $this->iterator = $iterator;
    }

    /**
     * Calls the passed function callable(value, key) for each item in the
     * iterator. If the function returns false iteration will stop.
     *
     * @param callable $callable
     * @throws \InvalidArgumentException
     */
    function walk($callable)
    {
        if (!is_callable($callable)) {
            throw new \InvalidArgumentException("Callable must be callable");
        }

        $iterator = $this->iterator;
        $iterator->rewind();
        iterator_apply($this->iterator, function() use ($callable, $iterator) {
            $response = $callable($iterator->current(), $iterator->key());
            // Anything but an explicit false should continue looping.
            return ($response !== false);
        });
    }

} 