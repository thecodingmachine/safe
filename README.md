Safe PHP
========

**Work in progress**

A set of core PHP functions rewritten to throw exceptions instead of returning `false` when an error is encountered.

## The problem

Most PHP core functions have been written before exception handling was added to the language. Therefore, most PHP functions
do not throw exceptions. Instead, they return `false` in case of error.

But most of us are too lazy to check explicitly for every single return of every core PHP function.

```php
// This code is incorrect. Twice.
// "file_get_contents" can return false if the file does not exists
// "json_decode" can return false if the file content is not valid JSON
$content = file_get_contents('foobar.json');
$foobar = json_decode($content);
```

The correct version of this code would be:

```php
$content = file_get_contents('foobar.json');
if ($content === false) {
    throw new FileLoadingException('Could not load file foobar.json');
}
$foobar = json_decode($content);
if ($foobar === false) {
    throw new FileLoadingException('foobar.json does not contain valid JSON: '.json_last_error());
}
```

Obviously, while this snippet is correct, it is less easy to read.

## The solution

Enters *thecodingmachine/safe* aka Safe-PHP.

Safe-PHP redeclares all core PHP functions. The new PHP functions are acting exactly as the old ones, except they are
throwing exceptions properly when an error is encountered. The "safe" functions have the same name as the core PHP
functions, except they are in the `Safe` namespace.

```php
use Safe\file_get_contents;
use Safe\json_decode;

// This code is both safe and simple!
$content = file_get_contents('foobar.json');
$foobar = json_decode($content);
```

## Installation

Use composer to install Safe-PHP:

```bash
$ composer require thecodingmachine/safe
```


