<?php

require_once __DIR__ . "/fixtures/AggregateArrayIterator.php";
require_once __DIR__ . "/fixtures/ConcreteFilterIterator.php";

class FilterIteratorTest extends PHPUnit_Framework_TestCase
{
    public function testCanWrapAnAggregateIterator()
    {
        $aggregateIterator = new AggregateArrayIterator(array("nope", "acceptable", "also no"));
        $regexIterator = new ConcreteFilterIterator($aggregateIterator, '/t.+/');

        $matches = array();
        foreach($regexIterator as $match) {
            $matches[] = $match;
        }

        $this->assertEquals(array('acceptable'), $matches);
    }
}
 