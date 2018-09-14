[![Latest Stable Version](https://poser.pugx.org/thecodingmachine/safe/v/stable.svg)](https://packagist.org/packages/thecodingmachine/safe)
[![Total Downloads](https://poser.pugx.org/thecodingmachine/safe/downloads.svg)](https://packagist.org/packages/thecodingmachine/safe)
[![Latest Unstable Version](https://poser.pugx.org/thecodingmachine/safe/v/unstable.svg)](https://packagist.org/packages/thecodingmachine/safe)
[![License](https://poser.pugx.org/thecodingmachine/safe/license.svg)](https://packagist.org/packages/thecodingmachine/safe)
[![Build Status](https://travis-ci.org/thecodingmachine/safe.svg?branch=master)](https://travis-ci.org/thecodingmachine/safe)
[![Coverage Status](https://coveralls.io/repos/thecodingmachine/safe/badge.svg?branch=master&service=github)](https://coveralls.io/github/thecodingmachine/safe?branch=master)

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
if (json_last_error() !== JSON_ERROR_NONE) {
    throw new FileLoadingException('foobar.json does not contain valid JSON: '.json_last_error_msg());
}
```

Obviously, while this snippet is correct, it is less easy to read.

## The solution

Enters *thecodingmachine/safe* aka Safe-PHP.

Safe-PHP redeclares all core PHP functions. The new PHP functions are acting exactly as the old ones, except they are
throwing exceptions properly when an error is encountered. The "safe" functions have the same name as the core PHP
functions, except they are in the `Safe` namespace.

```php
use function Safe\file_get_contents;
use function Safe\json_decode;

// This code is both safe and simple!
$content = file_get_contents('foobar.json');
$foobar = json_decode($content);
```

## PHPStan integration

> Yeah... but I must explicitly think about importing the "safe" variant of the function, for each and every file of my application.
> I'm sure I will forget some "use function" statements!

Fear not! thecodingmachine/safe comes with a PHPStan rule.

Never heard of [PHPStan](https://github.com/phpstan/phpstan) before?
Check it out, it's an amazing code analyzer for PHP.

Simply install the Safe rule in your PHPStan setup and PHPStan will let you know each time you are using an "unsafe" function:

The code below will trigger this warning:

```php
$content = file_get_contents('foobar.json');
```

> Function file_get_contents is unsafe to use. It can return FALSE instead of throwing an exception. Please add 'use function Safe\\file_get_contents;' at the beginning of the file to use the variant provided by the 'thecodingmachine/safe' library.

## Installation

Use composer to install Safe-PHP:

```bash
$ composer require thecodingmachine/safe
```

*Highly recommended*: install PHPStan and PHPStan extension:

```bash
$ composer require --dev thecodingmachine/phpstan-safe-rule
```

Now, edit your `phpstan.neon` file and add these rules:

```yml
includes:
    - vendor/thecodingmachine/phpstan-safe-rule/phpstan-safe-rule.neon
```


## Work in progress

There are a number of issues withstanding [before releasing 1.0](https://github.com/thecodingmachine/safe/milestone/1)

## Contributing

The files that contains all the functions are auto-generated from the PHP doc.
Read the [CONTRIBUTING.md](CONTRIBUTING.md) file to learn how to regenerate these files and to contribute to this library.
