<?php

namespace FredBradley\GoogleStorageUserPhotosEncrypter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string encrypt(string $value)
 * @method static string decrypt(string $value)
 * @method static bool active()
 *
 * @see \FredBradley\GoogleStorageUserPhotosEncrypter\GoogleStorageUserPhotosEncrypter
 */
class GoogleStorageUserPhotosEncrypter extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \FredBradley\GoogleStorageUserPhotosEncrypter\GoogleStorageUserPhotosEncrypter::class;
    }
}
