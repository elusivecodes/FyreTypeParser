# FyreTypeParser

**FyreTypeParser** is a free, open-source database type parser library for *PHP*.


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

Get the mapped [*Type*](#types) class for a value type.

- `$type` is a string representing the value type.

```php
$typeClass = TypeParser::getType($type);
```

**Get Type Map**

Get the type class map.

```php
$typeMap = TypeParser::useMap();
```

**Map Type**

Map a value type to a class.

- `$type` is a string representing the value type.
- `$typeClass` is a string representing the class name.

```php
TypeParser::mapType($type, $typeClass);
```

**Use**

Load a shared [*Type*](#types) instance for a value type.

- `$type` is a string representing the value type.

```php
$parser = TypeParser::use($type);
```


## Types

You can load a specific type parser by specifying the `$type` argument of the `use` method above.

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

### Binary

```php
$parser = TypeParser::use('binary');
```

### Boolean

```php
$parser = TypeParser::use('boolean');
```

### Date

```php
$parser = TypeParser::use('date');
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
$parser = TypeParser::use('datetime');
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

- `$format` is a string representing the locale format, or a *Closure* that returns the locale format.

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

- `$timeZone` is a string representing the time zone name, or a *Closure* that returns the time zone name.

```php
$parser->setUserTimeZone($timeZone);
```

### DateTime (Fractional)

```php
$parser = TypeParser::use('datetime-fractional');
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

### DateTime (Time Zone)

```php
$parser = TypeParser::use('datetime-timezone');
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
$parser = TypeParser::use('decimal');
```

### Enum

```php
$parser = TypeParser::use('enum');
```

### Float

```php
$parser = TypeParser::use('float');
```

### Integer

```php
$parser = TypeParser::use('integer');
```

### Json

```php
$parser = TypeParser::use('json');
```

**Set Encoding Flags**

Set the encoding flags.

- `$flags` is a number representing the encoding flags.

```php
$parser->setEncodingFlags($flags);
```

### Set

```php
$parser = TypeParser::use('set');
```

### String

```php
$parser = TypeParser::use('string');
```

### Text

```php
$parser = TypeParser::use('text');
```

### Time

```php
$parser = TypeParser::use('time');
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