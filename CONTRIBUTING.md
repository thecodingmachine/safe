# Contributing

Safe-PHP code is generated automatically from the PHP doc.

## How to generate Safe-PHP code

The first step is to download the PHP documentation project locally.
You will need Subversion (svn) installed on your computer.

```
cd doc
svn co https://svn.php.net/repository/phpdoc/modules/doc-en doc-en
cd ..
```

Generating the documentation is a 2 pass process.

### First pass: generating the function list

```bash
php ./parse.php
```

The first pass is used to find all the functions in the documentation and to put them in a CSV file called `generated/functions.csv`

This CSV file is then **manually edited** to cope for the specific cases of some functions (for instance, the cURL exception
messages can be fetched from `curl_strerror`).

### Second pass: generating the function list

```bash
php ./generate.php
```

The second pass uses the `generated/functions.csv` and the downloaded documentation to create the functions wrapper file
in `generated/lib.php`.

