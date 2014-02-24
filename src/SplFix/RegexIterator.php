<?php

namespace MeadSteve\SplFix;

class RegexIterator extends \RegexIterator
{
    /**
     * @param \Iterator|\Traversable $traversable
     * @param string $regex
     * @param int $mode
     * @param int $flags
     * @param int $preg_flags
     * @throws \InvalidArgumentException
     */
    public function __construct($traversable, $regex, $mode = \RegexIterator::MATCH, $flags = 0, $preg_flags = 0)
    {
        \RegexIterator::__construct(
            FilterIterator::getIteratorFromTraversable($traversable),
            $regex,
            $mode,
            $flags,
            $preg_flags
        );
    }

} 