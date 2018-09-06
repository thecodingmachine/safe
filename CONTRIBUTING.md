# Contributing

Safe-PHP code is generated automatically from the PHP doc.

## How to generate Safe-PHP code

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


### Generating the functions

Generating the functions can be done with a simple command line.

```bash
$ cd generator
$ php ./safe.php generate
```
