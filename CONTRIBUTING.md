# Contributing

Safe-PHP code is generated automatically from the PHP doc.

## How to install Safe-PHP development environment

The first step is to download the PHP documentation project locally.
You will need Subversion (svn) installed on your computer.

```bash
$ cd generator/doc
$ svn co https://svn.php.net/repository/phpdoc/modules/doc-en doc-en
$ cd ../..
```

At any point, if you want to update the documentation to the latest version, you can use:

```bash
$ cd generator/doc/doc-en
$ svn update
```

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

### Submitting a PR

The continuous integration hooks will regenerate all the functions and check that the result is exactly what has been
committed. Therefore, before submitting a PR, please:

- Perform a "svn update"
- Regenerate the files using `php ./safe.php generate`
