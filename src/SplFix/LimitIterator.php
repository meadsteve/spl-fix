<?php

namespace MeadSteve\SplFix;

use Iterator;

class LimitIterator extends \LimitIterator implements \Countable
{

    protected $maxCount;

    public function __construct(Iterator $iterator, $offset, $count)
    {
        $this->maxCount = $count;
        parent::__construct($iterator, $offset, $count);
    }


    /**
     * @return int
     */
    public function count()
    {
        return min(count($this->getInnerIterator()), $this->maxCount);
    }
} 