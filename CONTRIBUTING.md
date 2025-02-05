# Contributing

Safe-PHP code is generated automatically from the PHP doc.

## Architecture

* `generator/` contains a bunch of code which will look at the PHP docs,
  figure out which functions are unsafe, and will generate safe wrappers
  for them, which are then written to `generated/`. As a Safe-PHP developer,
  you probably spend most time here.
  * `generated/` will be deleted and regenerated from scratch as part of CI
    runs - don't manually edit any of these files.
* `lib/` contains some special cases where automatic generation is tricky.
  Ideally this should be kept small - the goal is to have as much as possible
  generated automatically.

### Generator

* `safe.php` is the CLI entry point, with a few utility commands, but the
  most important one is `\Safe\Commands\GenerateCommand`, which does the
  generation:
  * Use `\Safe\XmlDocParser` to parse the PHP XML documentation
    and pull out information about `Method`s, `Parameter`s, and
    `Type`s - try to figure out which methods are unsafe.
  * Use `\Safe\PhpStanFunctions` to get a bit of extra data from
    PHPStan's typehint database, and merge that with the XML info.
  * Given this list of unsafe functions, use `\Safe\Generator` to
    write a bunch of safe wrappers.

### End-Users

* Users who depend on safe-php via composer will have the files in
  `generated/` and the files in `lib/` auto-loaded; they shouldn't
  need to worry about any files outside those two directories.

## Minimum Supported PHP Version

See https://www.php.net/supported-versions.php

* The `generator` code should be compatible with "Active Support" versions
* The `generated` code should be compatible with "Active Support" and "Security Fixes" versions

## Installing dev dependencies

### With a devcontainer

If you use VSCode or similar, opening the project folder should prompt you to
re-open the folder inside a docker container with all the relevant tools
pre-installed.

### Manually

- php CLI (with dom and curl modules)
- composer

### With docker

`.devcontainer/Dockerfile` contains the necessary dependencies to run the
generator, as well as some handy shortcut shell scripts. You can use
`.devcontainer/build.sh` to regenerate the files in `generated/`, and
`.devcontainer/run.sh` to open a shell in the container.


## Building Safe-PHP

The first step is to download the PHP documentation project locally, using git.

```bash
$ cd generator/doc
$ sh update.sh
```

The script can be used to both install the doc and to update it.
All it does is pull from theses mirrors:

https://github.com/salathe/phpdoc-base

https://github.com/php/doc-en

To use the generator, you need to make sure you installed all the needed dependencies:

```bash
$ cd generator
$ composer install
```

### Generating the functions

Generating the functions can be done with a simple command.

```bash
$ cd generator
$ php ./safe.php generate
```

### Detecting new cases

`generator/src/XmlDocParser/DocPage.php` uses a list of regexes to scan the
documentation looking for functions which return `false` (or `null`) on error.
If you want to add support for more functions to Safe-PHP, the easiest way is
to add more regexes here.

If you detect more cases where `false` is an exception, then you should
probably also edit `Method.php::stripReturnFalseText()` to remove the
"returns false on error" text from the documentation.

### Special cases

In some cases, automatic generation is too difficult to execute and the function has to be written manually.
This should however only be done exceptionally in order to keep the project easy to maintain.
The most important examples are all the functions of the classes `DateTime` and `DateTimeImmutable`, since the entire classes have to be overloaded manually.
All custom objects must be located in `lib/` and custom functions must be in `lib/special_cases.php`.

## Submitting a PR

The continuous integration hooks will regenerate all the functions and check that the result is exactly what has been
committed. Therefore, before submitting a PR, please:

- Perform step 1 to update doc
- Regenerate the files using `php ./safe.php generate`
