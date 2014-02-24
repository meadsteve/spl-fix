<?php

use \MeadSteve\SplFix\EmptyIterator;

class EmptyIteratorTest extends PHPUnit_Framework_TestCase
{
    public function testCountsAsZero()
    {
        $iterator = new EmptyIterator();
        $this->assertEquals(0, count($iterator));
    }
}
 