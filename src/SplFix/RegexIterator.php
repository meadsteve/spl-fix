<?php

namespace MeadSteve\SplFix;

use Iterator;

class RegexIterator extends \RegexIterator
{
    /**
     * @param Iterator|\Traversable $traversable
     * @param string $regex
     * @param int $mode
     * @param int $flags
     * @param int $preg_flags
     * @throws \InvalidArgumentException
     */
    public function __construct($traversable, $regex, $mode = \RegexIterator::MATCH, $flags = 0, $preg_flags = 0)
    {
        if ($traversable instanceof Iterator) {
            $iterator = $traversable;
        }
        elseif ($traversable instanceof \Traversable) {
            $iterator = new \IteratorIterator($traversable);
        }
        else {
            throw new \InvalidArgumentException(
                '$traversable must implement either be an iterator or implement \Traversable'
            );
        }
        \RegexIterator::__construct($iterator, $regex, $mode, $flags, $preg_flags);
    }

} 