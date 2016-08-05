<?php

namespace MeadSteve\SplFix;

use Iterator;
use Countable;

/**
 * Class LimitIterator
 *
 * @package MeadSteve\SplFix
 */
class LimitIterator extends \LimitIterator implements Countable
{
    /**
     * @var integer
     */
    protected $maxCount;

    /**
     * LimitIterator constructor.
     *
     * @param \Iterator $iterator
     * @param           $offset
     * @param           $count
     */
    public function __construct(Iterator $iterator, $offset, $count)
    {
        $this->maxCount = $count;

        parent::__construct($iterator, $offset, $count);
    }

    /**
     * Counts things.
     *
     * @return integer
     */
    public function count()
    {
        return min(count($this->getInnerIterator()), $this->maxCount);
    }
}
