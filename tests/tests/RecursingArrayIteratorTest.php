<?php

class RecursingArrayIteratorTest extends PHPUnit_Framework_TestCase
{
    public function testRecursesOneLevel()
    {
        $data = array(1, 2, array(3, 4), 5);
        $iterator = new \MeadSteve\SplFix\RecursingArrayIterator($data);

        $results = array();
        foreach($iterator as $result) {
            $results[] = $result;
        }

        $this->assertEquals(array(1,2,3,4,5), $results);
    }

    public function testRecursesTwoLevels()
    {
        $data = array(1, 2, array(3, array(4, 4.5)), 5);
        $iterator = new \MeadSteve\SplFix\RecursingArrayIterator($data);

        $results = array();
        foreach($iterator as $result) {
            $results[] = $result;
        }

        $this->assertEquals(array(1,2,3,4,4.5,5), $results);
    }
}
 