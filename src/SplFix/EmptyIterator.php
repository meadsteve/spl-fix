<?php

namespace MeadSteve\SplFix;

class EmptyIterator extends \EmptyIterator implements \Countable
{
    public function count()
    {
        return 0;
    }
} 