# FileInfo

[![Build Status](https://travis-ci.org/nbish11/FileInfo.svg?branch=master)](https://travis-ci.org/nbish11/FileInfo)

## Table of Contents
* [About](#about)
* [Getting Started](#getting-started)
* [Usage](#usage)
* [API](#api)
* [Testing](#testing)
* [Contributors](#contributors)
* [License](#license)

## <a name="about"></a>About
FileInfo is simply a class that mimics the functionality of:
- [`path_info()`](http://php.net/manual/en/function.pathinfo.php)
- [`file_info` | `finfo`](http://php.net/manual/en/book.fileinfo.php)

## <a name="getting-started"></a>Getting Started
1. PHP 5.3.x is required
2. Install manually

## <a name="usage"></a>Usage
Include and instantiate:

```php
require 'path\to\FileInfo.php';

$finfo = new FileInfo('path\to\file.txt', true);
```

Get mimetype using a function:

```php
$finfo->getMimeType(); // returns 'text/plain'
```

Or get mimetype as a class property:

```php
$finfo->mimetype; // returns 'text/plain'
```

## <a name="api"></a>API

Below is a list of the public methods available for use.

```php
$finfo->
    __construct($file, $exists = false)     // Set file and check for file existence.
    getDirectory()                          // Get the directory.
    getBaseName()                           // Get the basename (with extension).
    getExtension()                          // Get the file extension.
    getFileName()                           // Get the filename (basename without extension).
    getMimeType()                           // Get the mimetype/content-type.
    __isset($key)                           // Allows to check __get() properties for existence.
    __get($key)                             // Get a non-existant class property.
```

## <a name="testing"></a>Testing
This project keeps all tests stored in the `/tests` folder
and uses the [PHPUnit](https://github.com/sebastianbergmann/phpunit/) 
testing framework.

## <a name="contributors"></a>Contributors


## <a name="license"></a>License

(GNU General Public License, version 2)

Copyright &copy; 2013, [Nathan Bishop](nbish11@hotmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
