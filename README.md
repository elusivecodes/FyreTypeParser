# FyreTypeParser

**FyreTypeParser** is a free, database type parser library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Methods](#methods)
- [Types](#types)



## Installation

**Using Composer**

```
composer require fyre/typeparser
```

In PHP:

```php
use Fyre\DB\TypeParser;
```


## Methods

**Clear**

Clear all loaded types.

```php
TypeParser::clear();
```

**Get Type**

Get a *Type* class for a value type.

- `$type` is a string representing the value type.

```php
$parser = TypeParser::getType($type);
```

**Map Type**

Map a value type to a class.

- `$type` is a string representing the value type.
- `$typeClass` is a string representing the class name.

```php
TypeParser::mapType($type, $typeClass);
```


## Types

You can load a specific type parser by specifying the `$type` argument of the `getType` method above.

Custom type parsers can be created by extending `\Fyre\DB\Types\Type`, ensuring all below methods are implemented.

**From Database**

Parse a database value to PHP value.

- `$value` is the value to parse.

```php
$parsedValue = $parser->fromDatabase($value);
```

**Parse**

Parse a user value to PHP value.

- `$value` is the value to parse.

```php
$parsedValue = $parser->parse($value);
```

**To Database**

Parse a PHP value to database value.

- `$value` is the value to parse.

```php
$dbValue = $parser->toDatabase($value);
```

### Boolean

```php
$parser = TypeParser::getType('boolean');
```

### Date

```php
$parser = TypeParser::getType('date');
```

**Get Locale Format**

Get the locale format.

```php
$format = $parser->getLocaleFormat();
```

**Set Locale Format**

Set the locale format.

- `$format` is a string representing the locale format.

```php
$parser->setLocaleFormat($format);
```

### DateTime

```php
$parser = TypeParser::getType('datetime');
```

**Get Locale Format**

Get the locale format.

```php
$format = $parser->getLocaleFormat();
```

**Get Server Time Zone**

Get the server time zone.

```php
$timeZone = $parser->getServerTimeZone();
```

**Get User Time Zone**

Get the user time zone.

```php
$timeZone = $parser->getUserTimeZone();
```

**Set Locale Format**

Set the locale format.

- `$format` is a string representing the locale format.

```php
$parser->setLocaleFormat($format);
```

**Set Server Time Zone**

Get the server time zone.

- `$timeZone` is a string representing the time zone name.

```php
$parser->setServerTimeZone($timeZone);
```

**Set User Time Zone**

Get the user time zone.

- `$timeZone` is a string representing the time zone name.

```php
$parser->setUserTimeZone($timeZone);
```

### Decimal

```php
$parser = TypeParser::getType('decimal');
```

### Float

```php
$parser = TypeParser::getType('float');
```

### Integer

```php
$parser = TypeParser::getType('integer');
```

### Json

```php
$parser = TypeParser::getType('json');
```

**Set Encoding Flags**

Set the encoding flags.

- `$flags` is a number representing the encoding flags.

```php
$parser->setEncodingFlags($flags);
```

### String

```php
$parser = TypeParser::getType('string');
```

### Time

```php
$parser = TypeParser::getType('time');
```

**Get Locale Format**

Get the locale format.

```php
$format = $parser->getLocaleFormat();
```

**Set Locale Format**

Set the locale format.

- `$format` is a string representing the locale format.

```php
$parser->setLocaleFormat($format);
```