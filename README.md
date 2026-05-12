# Laravel Addresses

Reusable address logic for Laravel applications.

## Installation

Install the package via Composer:

```bash
composer require vision/laravel-addresses
```

Laravel will automatically discover the service provider.

## Usage

### Migrations

The package includes a migration for the `addresses` table. Publish the migration with:

```bash
php artisan vendor:publish --tag=laravel-addresses-migrations
```

Then run:

```bash
php artisan migrate
```

### Model Trait

Use the `HasAddresses` trait on any Eloquent model that should have addresses.

```php
use Illuminate\Database\Eloquent\Model;
use Vision\LaravelAddresses\Traits\HasAddresses;

class User extends Model
{
    use HasAddresses;
}
```

### Working with addresses

```php
$user = User::find(1);

// Create or update the primary address
$user->updateAddress([
    'line_1' => '123 Main St',
    'city' => 'Anytown',
    'state' => 'CA',
    'postal_code' => '12345',
    'country' => 'USA',
]);

// Get the primary address
$address = $user->address('primary')->first();

// Get all addresses
$addresses = $user->addresses;
```

### Address model

The package provides an `Address` model at `Vision\LaravelAddresses\Models\Address`.

### Publishing

To publish only the migration file:

```bash
php artisan vendor:publish --provider="Vision\LaravelAddresses\AddressServiceProvider" --tag=laravel-addresses-migrations
```

## Testing

This package is designed to work with Orchestra Testbench for package testing.

## License

MIT
