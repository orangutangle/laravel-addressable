# Custom D Addressable

**Custom D Addressable** is a Laravel package to manage addresses that belong to your models. You can add addresses to any eloquent model with ease.

[![Packagist](https://img.shields.io/packagist/v/customd/laravel-addressable.svg?label=Packagist&style=flat-square)](https://packagist.org/packages/customd/laravel-addressable)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/customd/laravel-addressable.svg?label=Scrutinizer&style=flat-square)](https://scrutinizer-ci.com/g/customd/laravel-addressable/)
[![Travis](https://img.shields.io/travis/customd/laravel-addressable.svg?label=TravisCI&style=flat-square)](https://travis-ci.org/customd/laravel-addressable)
[![StyleCI](https://styleci.io/repos/87485079/shield)](https://styleci.io/repos/87485079)
[![License](https://img.shields.io/packagist/l/customd/laravel-addressable.svg?label=License&style=flat-square)](https://github.com/customd/laravel-addressable/blob/develop/LICENSE)


## Installation

1. Install the package via composer:
    ```shell
    composer require customd/laravel-addresses
    ```

2. Publish resources (migrations and config files):
    ```shell
    php artisan vendor:publish --provider="CustomD\Addressable\AddressesServiceProvider"
    ```

3. Run migrations:
    ```shell
    php artisan migrate
    ```

4. Done!


## Usage

To add addresses support to your eloquent models simply use `\CustomD\Addressable\Traits\Addressable` trait.

### Manage your addresses

```php
// Get instance of your model
$user = new \App\Models\User::find(1);

// Create a new address
$user->addresses()->create([
    'label' => 'Default Address',
    'given_name' => 'Jane',
    'family_name' => 'Doe',
    'organization' => 'Custom D',
    'country_code' => 'eg',
    'street' => '56 john doe st.',
    'state' => 'Canterbury',
    'city' => 'Christchurch',
    'postal_code' => '7614',
    'latitude' => '31.2467601',
    'longitude' => '29.9020376',
    'is_primary' => true,
]);

// Create multiple new addresses
$user->addresses()->createMany([
    [...],
    [...],
    [...],
]);

// Find an existing address
$address = app('addressable.address')->find(1);

// Update an existing address
$address->update([
    'label' => 'Default Work Address',
]);

// Delete address
$address->delete();

// Alternative way of address deletion
$user->addresses()->where('id', 123)->first()->delete();
```

### Manage your addressable model

The API is intuitive and very straight forward, so let's give it a quick look:

```php
// Get instance of your model
$user = new \App\Models\User::find(1);

// Get attached addresses collection
$user->addresses;

// Get attached addresses query builder
$user->addresses();

// Scope Primary Addresses
$primaryAddresses = app('addressable.address')->isPrimary()->get();

// Scope Addresses in the given country
$egyptianAddresses = app('addressable.address')->inCountry('eg')->get();

// Find all users within 5 kilometers radius from the latitude/longitude 31.2467601/29.9020376
$fiveKmAddresses = \App\Models\User::findByDistance(5, 'kilometers', '31.2467601', '29.9020376')->get();

// Alternative method to find users within certain radius
$user = new \App\Models\User();
$users = $user->lat('31.2467601')->lng('29.9020376')->within(5, 'kilometers')->get();
```


## Changelog

Refer to the [Changelog](CHANGELOG.md) for a full history of the project.


## Support

Please raise a GitHub issue.

## Contributing & Protocols

Thank you for considering contributing to this project! The contribution guide can be found in [CONTRIBUTING.md](CONTRIBUTING.md).

Bug reports, feature requests, and pull requests are very welcome.

- [Versioning](CONTRIBUTING.md#versioning)
- [Versioning](CONTRIBUTING.md#commit-notes)
- [Pull Requests](CONTRIBUTING.md#pull-requests)
- [Coding Standards](CONTRIBUTING.md#coding-standards)
- [Feature Requests](CONTRIBUTING.md#feature-requests)


## Security Vulnerabilities

If you discover a security vulnerability within this project, please send an e-mail to [help@customd.com](help@customd.com). All security vulnerabilities will be promptly addressed.


## License

This software is released under [The MIT License (MIT)](LICENSE).
