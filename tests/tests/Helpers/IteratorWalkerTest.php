<?php

namespace Helpers;

use MeadSteve\SplFix\Helpers\IteratorWalker;

class IteratorWalkerTest extends \PHPUnit_Framework_TestCase
{
    public function testWalk_CallsFunctionWithKeyAndValue()
    {
        $input = array(1 => "one", 2 => "two");
        $iterator = new \ArrayIterator($input);
        $walker = new IteratorWalker($iterator);

        $output = array();
        $walker->walk(function($value, $key) use (&$output) {
            $output[$key] = $value;
        });

        $this->assertEquals($input, $output);
    }

    public function testWalk_StopsWhenFalseIsReturned()
    {
        $input = array(1 => "one", 2 => "two");
        $iterator = new \ArrayIterator($input);
        $walker = new IteratorWalker($iterator);

        $output = array();
        $walker->walk(function($value, $key) use (&$output) {
            $output[$key] = $value;
            return false;
        });

        // only the first item as the iteration was stopped.
        $this->assertEquals(array(1 => "one"), $output);
    }

    public function testWalk_ReceivesCustomUserData()
    {
        $input = array(1 => "one", 2 => "two");
        $iterator = new \ArrayIterator($input);
        $walker = new IteratorWalker($iterator);

        $output = array();
        $walker->walk(
            function($value, $key, $userData) use (&$output) {
                $output[$key] = $userData;
            },
            "hammerTime"
        );

        // The function writes the userdata into the output array ignoring the actual input value.
        $this->assertEquals(array(1 => "hammerTime", 2 => "hammerTime"), $output);
    }
}
 