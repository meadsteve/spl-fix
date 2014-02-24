<?php

use MeadSteve\SplFix\LimitIterator;

class LimitIteratorTest extends PHPUnit_Framework_TestCase
{
    public function testCount_CorrectWhenLimitIsSmaller()
    {
        $iterator = new ArrayIterator(array(1,2,3));
        $limited = new LimitIterator($iterator, 0, 2);
        $count = count($limited);
        $this->assertEquals(2, $count);
    }

    public function testCount_CorrectWhenLimitIsLarger()
    {
        $iterator = new ArrayIterator(array(1,2,3));
        $limited = new LimitIterator($iterator, 0, 4);
        $count = count($limited);
        $this->assertEquals(3, $count);
    }

    public function testCount_CorrectWhenOffsetIsNonZero()
    {
        $iterator = new ArrayIterator(array(1,2,3));
        $limited = new LimitIterator($iterator, 2, 1);
        $count = count($limited);
        $this->assertEquals(1, $count);
    }
}
 