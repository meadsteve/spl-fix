<?php

namespace MeadSteve\SplFix;

class RecursingArrayIterator extends \RecursiveIteratorIterator
{
    /**
     * @param array $array - array to iterate over. Any arrays within will also
     *                       be recursively iterated.
     * @param int $mode    - See RecursiveIteratorIterator docs.
     * @param int $flags
     */
    public function __construct(
        array $array,
        $mode = \RecursiveIteratorIterator::LEAVES_ONLY,
        $flags = 0)
    {
        parent::__construct(
            new \RecursiveArrayIterator($array),
            $mode,
            $flags
        );
    }
}