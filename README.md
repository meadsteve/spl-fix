spl-fix
=======
[![Build Status](https://travis-ci.org/meadsteve/spl-fix.png?branch=master)](https://travis-ci.org/meadsteve/spl-fix)

The php spl has some really cool feaures but also some bugs/gotchas. This is a library to wrap and hopefully reduce the pain caused by the spl.

# Installation

The easiest way to install this library is using composer. In your project's `composer.json` file add:

```json
    {
        "require": {
            "mead-steve/spl-fix": "dev-master"
        }
    }
```

Then run `composer update`.

# Fixes

## LimitIterator

The limit iterator is very useful if you want to grab a subset of an iterator. Good right? Pass it to count() however and you'll always get a value of 1. This package provides an updated LimitIterator class that correctly implements countable.

## EmptyIterator
Fixed so that passing it to count() returns zero. It's empty after all.

## FilterIterator

The spl FilterIterator can only be passed an iterator. This is now wrapped so that any traversable can be passed in. This is handled by wrapping the traversable in an IteratorIterator.
The following child Iterators have also been wrapped:
- RegexIterator

# Additions

## RecursingArrayIterator
This is a short hand for wrapping an array in a RecursiveIterator then wrapping that in a
RecursiveIteratorIterator.

## Helpers/IteratorWalker
The IteratorWalker allows iterators to be used in the same way arrays are used in array_walk. So that the two snippets
will behave in the same way:

```php
    array_walk($array, function($value, $key) {
        echo $key . "=>" . $value;
    });
```

```php
    $walker = new IteratorWalker($iterator);
    $walker->walk(function($value, $key) {
        echo $key . "=>" . $value;
    });
```