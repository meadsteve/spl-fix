spl-fix
=======

The php spl has some really cool feaures but also some bugs/gotchas. This is a library to wrap and hopefully reduce the pain caused by the spl.

Fixes/Additions
=======

## LimitIterator

The limit iterator is very useful if you want to grab a subset of an iterator. Good right? Pass it to count() however and you'll always get a value of 1. This package provides an updated LimitIterator class that correctly implements countable.

## RegexIterator

The spl regex iterator can only be passed an iterator. This is now wrapped so that any traversable can be passed in. This is handled by wrapping the traversible in an IteratorIterator.