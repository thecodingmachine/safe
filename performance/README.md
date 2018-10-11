Performance
===========

Composer's `vendor/autoload.php` file [requires all Safe files](https://github.com/thecodingmachine/safe/blob/05925e1d2abe0c0fee2095c1d569a1302a1a209e/composer.json#L13-L97)
on each request (since there is [no autoloading for functions in PHP](https://wiki.php.net/rfc/function_autoloading)).

"Requiring" those ~84 files in PHP has a performance impact. We used [Blackfire](http://blackfire.io/) to time precisely the impact of loading the PHP files.

Results
-------

| ||
|-----------------------------------------------------------------------------------------------------------|-------|
|[Composer autoload without Safe](https://blackfire.io/profiles/cb9122ac-69a7-4e90-9ea7-bf7561058815/graph) | 264µs |
|[Composer autoload with Safe](https://blackfire.io/profiles/35eb02eb-60f8-480a-bad0-0cfc43179c18/graph) | 1.03ms |

Safe load time: **~700µs**

Only 700µs for loading 84 files containing 1000+ functions. Damn, PHP is fast! Opcache does a very good job.

The tests have been performed on a DELL XPS 9550 laptop running Ubuntu 18.04 and Docker. CPU: [Intel(R) Core(TM) i7-6700HQ](https://ark.intel.com/products/88967/Intel-Core-i7-6700HQ-Processor-6M-Cache-up-to-3-50-GHz-)

Reproducing the test
--------------------

There are 2 test files:

- `test_with_safe/index.php`: loads Composer autoloader with Safe
- `test_without_safe/index.php`: loads Composer autoloader without Safe

Both test files are only loading Composer autoloader (with and without Safe), then echoing "foo".

For each file, you need to install the Composer dependencies:

```bash
cd test_with_safe
composer install
cd ..
cd test_without_safe
composer install
cd ..
```

A `docker-compose.yml` file is provided to start a PHP 7.2 environment with Blackfire enabled.

To start the environment, simply type:

```bash
BLACKFIRE_SERVER_ID=[xyz] BLACKFIRE_SERVER_TOKEN=[abc] docker-compose up
```

You can now browse to `http://localhost:8888/test_with_safe` and `http://localhost:8888/test_without_safe` and profile it using the [Blackfire companion](https://blackfire.io/docs/integrations/firefox)

