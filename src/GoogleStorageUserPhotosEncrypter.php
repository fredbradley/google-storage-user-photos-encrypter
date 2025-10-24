<?php

namespace FredBradley\GoogleStorageUserPhotosEncrypter;

use Illuminate\Encryption\Encrypter;

class GoogleStorageUserPhotosEncrypter
{
    public function __construct(protected Encrypter $encrypter) {}

    public function encrypt(string $value): string
    {
        return $this->encrypter->encrypt($value);
    }

    public function decrypt(string $value): string
    {
        return $this->encrypter->decrypt($value);
    }
}
