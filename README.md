# Word Generator

Generates creative words by randomly combining adjectives and nouns. 
This is useful for situations in which you need to generate a name that is unique or memorable.

## Installation

To install the package, run the following command:
```bash 
composer require iritesh37/random-word-generator
```

## Usage

```php
<?php

use Iritesh37\RandomWordGenerator\Generator;

echo Generator::generate(); // Outputs 'autumn firefly', 'crimson meadow', etc.

```

It's also possible to use a custom separator character, by passing it as the first argument:
```php
<?php

use Iritesh37\RandomWordGenerator\Generator;

echo Generator::generate('-'); // Outputs 'autumn-firefly', 'crimson-meadow', etc.

```

If you need words of a certain length or complexity, you can use the second argument to increase the number of adjectives used:
```php
<?php

use Iritesh37\RandomWordGenerator\Generator;

echo Generator::generate('-', 4); // Outputs 'crimson-autumn-wandering-firefly', etc.

```

### Custom Word Lists

It is also possible to override the adjectives and nouns that can be used to generate the random phrases. For example, you may wish to do this if you want to use words that are themed or branded to your project.

To override the adjectives and nouns at the same time, you can pass an array of strings for both the first and second parameter:

```php
<?php

use Iritesh37\RandomWordGenerator\Generator;

$adjectives = ['adjective one', 'adjective two'];
$nouns = ['noun one', 'noun two'];

Generator::setWordLists($adjectives, $nouns);
```

If you only wish to override the adjectives, you can use the following:

```php
<?php

use Iritesh37\RandomWordGenerator\Words\Adjective;

$adjectives = ['adjective one', 'adjective two'];

Adjective::setWordList($adjectives);
```

If you only wish to override the nouns, you can use the following:

```php
<?php

use Iritesh37\RandomWordGenerator\Words\Noun;

$nouns = ['noun one', 'noun two'];

Noun::setWordList($nouns);
```
## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.