# FileInfo

## Table of Contents

* [About](#about)
* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [API](#api)
* [Testing](#testing)
* [Contributors](#contributors)
* [Copyright](#copyright)
* [License](#license)

## <a name="about"></a>About
FileInfo is nothing more than a simple wrapper for PHP's `path_info()` function 
but with added mimetype support. FileInfo does NOT make use of the `path_info()` 
or the `file_info()` functions within the class either.

## <a name="installation"></a>Installation


## <a name="configuration"></a>Configuration
You may pass `true` as the second argument to the constructor to check for file existance.
E.g. `new FileInfo('file.txt', true);`

## <a name="usage"></a>Usage

Creating a new FileInfo instance:

```php
require 'path\to\FileInfo.php';

$finfo = new FileInfo('path\to\file.txt');
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
    __construct($file, $exists = false)     // Set file and check for file existance.
    getDirectory()                          // Get the directory.
    getBaseName()                           // Get the basename (includes extension).
    getExtension()                          // Get the file extension.
    getFileName()                           // Get the filename (basename without extension).
    getMimeType()                           // Get the mimetype/content-type.
    __get($key)                             // Get a non-existant class property.
```

## <a name="testing"></a>Testing
I currently do not know much about unit testing. However if someone is able to unit 
test for me that would be greatly appreciated.

## <a name="contributors"></a>Contributors
* "Nathan Bishop" <nbish11@hotmail.com>

## <a name="copyright"></a>Copyright
Copyright &copy; 2013, Nathan Bishop

## <a name="license"></a>License (GPL)

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