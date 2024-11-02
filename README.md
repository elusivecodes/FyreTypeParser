# FyreTypeParser

**FyreTypeParser** is a free, open-source database type parser library for *PHP*.


## Table Of Contents
- [Installation](#installation)
- [Basic Usage](#basic-usage)
- [Methods](#methods)
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


## Basic Usage

- `$container` is a [*Container*](https://github.com/elusivecodes/FyreContainer).

```php
$typeParser = new TypeParser($container);
```

**Autoloading**

It is recommended to bind the *TypeParser* to the [*Container*](https://github.com/elusivecodes/FyreContainer) as a singleton.

```php
$container->singleton(TypeParser::class);
```


## Methods

**Clear**

Clear all loaded types.

```php
$typeParser->clear();
```

**Get Type**

Get the mapped [*Type*](#types) class for a value type.

- `$type` is a string representing the value type.

```php
$typeClass = $typeParser->getType($type);
```

**Get Type Map**

Get the type class map.

```php
$typeMap = $typeParser->getTypeMap();
```

**Map**

Map a value type to a class.

- `$type` is a string representing the value type.
- `$typeClass` is a string representing the class name.

```php
$typeParser->map($type, $typeClass);
```

**Use**

Load a shared [*Type*](#types) instance for a value type.

- `$type` is a string representing the value type.

```php
$parser = $typeParser->use($type);
```

Custom [*Type*](#types) dependencies will be resolved automatically from the [*Container*](https://github.com/elusivecodes/FyreContainer).


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
$parser = $typeParser->use('binary');
```

### Boolean

```php
$parser = $typeParser->use('boolean');
```

### Date

```php
$parser = $typeParser->use('date');
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
$parser = $typeParser->use('datetime');
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
$parser = $typeParser->use('datetime-fractional');
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
$parser = $typeParser->use('datetime-timezone');
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
$parser = $typeParser->use('decimal');
```

### Enum

```php
$parser = $typeParser->use('enum');
```

### Float

```php
$parser = $typeParser->use('float');
```

### Integer

```php
$parser = $typeParser->use('integer');
```

### Json

```php
$parser = $typeParser->use('json');
```

**Set Encoding Flags**

Set the encoding flags.

- `$flags` is a number representing the encoding flags.

```php
$parser->setEncodingFlags($flags);
```

### Set

```php
$parser = $typeParser->use('set');
```

### String

```php
$parser = $typeParser->use('string');
```

### Text

```php
$parser = $typeParser->use('text');
```

### Time

```php
$parser = $typeParser->use('time');
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