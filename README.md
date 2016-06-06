PHP Binary Search
=================

This is a composer package which wraps up the algorithm written by Michael King from ([mkwd.net](http://mkwd.net)).

By performaing a binary search rather than a linear search, this package provides functionality to perform searches through ordered arrays with greatly imroved performance over PHP's [array_search](http://php.net/manual/en/function.array-search.php)

Installation
------------
As of yet, this is not available on [Packagist](https://packagist.org/) - although it will be very shortly. Until then, it can be installed as shown below.

~~~~
{
  "repositories": [
    {
      "type": "package",
      "package": {
        "name": "mannion007/php-binary-search",
        "version": "1.0.3",
        "source": {
          "url": "git@github.com:mannion007/composer.git",
          "type": "git",
          "reference": "master"
        }
      }
    }
  ],
  "require": {
    "mannion007/php-binary-search": "1.0.3"
  }
}
~~~~