# Contributing

Safe-PHP code is generated automatically from the PHP doc.

## Install dependencies

### With a devcontainer

If you use VSCode or similar, opening the project folder should prompt you to
re-open the folder inside a docker container with all the relevant tools
pre-installed.

### Manually

- php8.2+ CLI (with dom and curl modules)
- composer

## How to install Safe-PHP development environment

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

## Special cases

In some cases, automatic generation is too difficult to execute and the function has to be written manually.
This should however only be done exceptionally in order to keep the project easy to maintain.
The most important examples are all the functions of the classes `DateTime` and `DateTimeImmutable`, since the entire classes have to be overloaded manually.
All custom objects must be located in lib/ and custom functions must be in lib/special_cases.php.

### Submitting a PR

The continuous integration hooks will regenerate all the functions and check that the result is exactly what has been
committed. Therefore, before submitting a PR, please:

- Perform step 1 to update doc
- Regenerate the files using `php ./safe.php generate`
