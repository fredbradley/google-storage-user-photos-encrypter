# Custom Encrypter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/fredbradley/google-storage-user-photos-encrypter.svg?style=flat-square)](https://packagist.org/packages/fredbradley/google-storage-user-photos-encrypter)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/fredbradley/google-storage-user-photos-encrypter/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/fredbradley/google-storage-user-photos-encrypter/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/fredbradley/google-storage-user-photos-encrypter/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/fredbradley/google-storage-user-photos-encrypter/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/fredbradley/google-storage-user-photos-encrypter.svg?style=flat-square)](https://packagist.org/packages/fredbradley/google-storage-user-photos-encrypter)

A custom encrypter for user photos stored in Google Cloud Storage, for the purpose of being able to encrypt the documents into Google Storage, but use them across multiple Laravel applications with the same encryption keys.

## Installation

You can install the package via composer:

```bash
composer require fredbradley/google-storage-user-photos-encrypter
```

You _can_ publish the config file with, but it's not necessary to:

```bash
php artisan vendor:publish --tag="google-storage-user-photos-encrypter-config"
```

You will need to add your `USER_PHOTOS_ENCRYPTION_KEY` and you may want to override the default cipher by adding these two lines to your `.env` file:
```env
USER_PHOTOS_ENCRYPTION_KEY=base64:your-base64-encoded-key-here
USER_PHOTOS_ENCRYPTION_CIPHER=AES-256-CBC
```

## Usage
### As a Facade:
```php
// A check to see whether encrypter status is on. (Just add `USER_PHOTOS_ENCRYPTION_STATUS=on` to your .env to enable it)
if (\FredBradley\GoogleStorageUserPhotosEncrypter\Facades\GoogleStorageUserPhotosEncrypter::active()) {
// returns a bool 
}

// Encrypt a value
$encryptedString = \FredBradley\GoogleStorageUserPhotosEncrypter\Facades\GoogleStorageUserPhotosEncrypter::encrypt($string);

// Decrypt a value  
$string = \FredBradley\GoogleStorageUserPhotosEncrypter\Facades\GoogleStorageUserPhotosEncrypter::decrypt($encryptedString);
```
### Via Dependency Injection:
```php
public function handle(\FredBradley\GoogleStorageUserPhotosEncrypter\GoogleStorageUserPhotosEncrypter $encrypter)
{
    $string = "test string";
    
    if ($encrypter::active()) {
       
        // Encrypt a value
        $encryptedString = $encrypter->encrypt($string);

        // Decrypt a value  
        $string = $encrypter->decrypt($encryptedString);
    }
    
    return $string;
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Fred Bradley](https://github.com/fredbradley)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
