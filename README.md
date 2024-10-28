# FyreTypeParser

**FyreTypeParser** is a free, open-source database type parser library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [TypeParser Creation](#typeparser-creation)
- [TypeParser Methods](#typeparser-methods)
- [Types](#types)
    - [Binary](#binary)
    - [Boolean](#boolean)
    - [DateTime](#datetime)
    - [DateTime (Fractional)](#datetime-fractional)
    - [DateTime (Time Zone)](#datetime-time-zone)
    - [Decimal](#decimal)
    - [Enum](#enum)
    - [Float](#float)
    - [Integer](#integer)
    - [Json](#json)
    - [Set](#set)
    - [String](#string)
    - [Text](#text)
    - [Time](#time)



## Installation

**Using Composer**

```
composer require fyre/typeparser
```

In PHP:

```php
use Fyre\DB\TypeParser;
```


## TypeParser Creation

```php
$type = new TypeParser();
```


## TypeParser Methods

**Clear**

Clear all loaded types.

```php
$type->clear();
```

**Get Type**

Get the mapped [*Type*](#types) class for a value type.

- `$type` is a string representing the value type.

```php
$typeClass = $type->getType($type);
```

**Get Type Map**

Get the type class map.

```php
$typeMap = $type->getTypeMap();
```

**Map**

Map a value type to a class.

- `$type` is a string representing the value type.
- `$typeClass` is a string representing the class name.

```php
$type->map($type, $typeClass);
```

**Use**

Load a shared [*Type*](#types) instance for a value type.

- `$type` is a string representing the value type.

```php
$parser = $type->use($type);
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
$parser = $type->use('binary');
```

### Boolean

```php
$parser = $type->use('boolean');
```

### Date

```php
$parser = $type->use('date');
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
$parser = $type->use('datetime');
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
$parser = $type->use('datetime-fractional');
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
$parser = $type->use('datetime-timezone');
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
$parser = $type->use('decimal');
```

### Enum

```php
$parser = $type->use('enum');
```

### Float

```php
$parser = $type->use('float');
```

### Integer

```php
$parser = $type->use('integer');
```

### Json

```php
$parser = $type->use('json');
```

**Set Encoding Flags**

Set the encoding flags.

- `$flags` is a number representing the encoding flags.

```php
$parser->setEncodingFlags($flags);
```

### Set

```php
$parser = $type->use('set');
```

### String

```php
$parser = $type->use('string');
```

### Text

```php
$parser = $type->use('text');
```

### Time

```php
$parser = $type->use('time');
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