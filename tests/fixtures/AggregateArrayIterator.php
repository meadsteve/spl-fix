<?php

class AggregateArrayIterator implements IteratorAggregate
{
    protected $array;

    function __construct($array)
    {
        $this->array = $array;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->array);
    }

} 