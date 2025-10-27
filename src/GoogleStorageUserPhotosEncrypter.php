<?php

namespace FredBradley\GoogleStorageUserPhotosEncrypter;

use Illuminate\Encryption\Encrypter;

class GoogleStorageUserPhotosEncrypter
{
    public function __construct(protected Encrypter $encrypter) {}

    public function active(): bool
    {
        if (config('google-storage-user-photos-encrypter.status') === null) {
            return false;
        }
        return true;
    }
    public function encrypt(string $value): string
    {
        return $this->encrypter->encrypt($value);
    }

    public function decrypt(string $value): string
    {
        return $this->encrypter->decrypt($value);
    }
}
