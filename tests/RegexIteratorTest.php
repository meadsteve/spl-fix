<?php

use \MeadSteve\SplFix\RegexIterator;

require_once __DIR__ . "/fixtures/AggregateArrayIterator.php";

class RegexIteratorTest extends PHPUnit_Framework_TestCase
{
    public function testCanWrapAnAggregateIterator()
    {
        $aggregateIterator = new AggregateArrayIterator(array("one", "two", "three"));
        $regexIterator = new RegexIterator($aggregateIterator, '/t.+/');

        $matches = array();
        foreach($regexIterator as $match) {
            $matches[] = $match;
        }

        $this->assertEquals(array('two', 'three'), $matches);
    }
}
 