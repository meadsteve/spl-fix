<?php

namespace MeadSteve\SplFix;

use Iterator;

abstract class FilterIterator extends \FilterIterator
{
    /**
     * @param \Iterator|\Traversable $traversable
     * @throws \InvalidArgumentException
     */
    public function __construct($traversable)
    {
        parent::__construct(self::getIteratorFromTraversable($traversable));
    }

    /**
     * @param \Iterator|\Traversable $traversable
     * @return \Iterator
     * @throws \InvalidArgumentException
     */
    public static function getIteratorFromTraversable($traversable)
    {
        if ($traversable instanceof \Iterator) {
            return $traversable;
        }
        elseif ($traversable instanceof \Traversable) {
            return new \IteratorIterator($traversable);
        }
        else {
            throw new \InvalidArgumentException(
                '$traversable must implement either be an iterator or implement \Traversable'
            );
        }
    }
} 