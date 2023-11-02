# A Inline Boolean field for Laravel Nova

## Installation

First you must install this package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require scouser03/inline-boolean
```

## Usage

```php
namespace App\Nova;

use Spatie\TagsField\Tags;
use Scouser03\InlineBoolean\InlineBoolean;

class BlogPost extends Resource
{
    // ...

    public function fields(Request $request)
    {
        return [
            // ...

            InlineBoolean::make('Active'),

            // ...
        ];
    }
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
