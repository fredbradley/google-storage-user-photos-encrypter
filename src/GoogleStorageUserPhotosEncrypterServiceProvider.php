<?php

namespace FredBradley\GoogleStorageUserPhotosEncrypter;

use Illuminate\Encryption\Encrypter;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GoogleStorageUserPhotosEncrypterServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('google-storage-user-photos-encrypter')
            ->hasConfigFile();
    }

    public function packageRegistered(): void
    {
        // Register singleton
        $this->app->singleton(GoogleStorageUserPhotosEncrypter::class, function ($app) {
            $config = $app['config']->get('google-storage-user-photos-encrypter');

            $key = $config['key'] ?? null;
            if (empty($key)) {
                throw new \RuntimeException('Missing USER_PHOTOS_ENCRYPTION_KEY in environment.');
            }

            if (str_starts_with($key, 'base64:')) {
                $key = base64_decode(substr($key, 7));
            }

            $cipher = $config['cipher'] ?? 'AES-256-CBC';

            $encrypter = new Encrypter($key, $cipher);

            return new GoogleStorageUserPhotosEncrypter($encrypter);
        });
    }
}
