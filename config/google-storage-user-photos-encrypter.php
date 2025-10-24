<?php

// config for FredBradley/GoogleStorageUserPhotosEncrypter
return [

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used to encrypt user photo data for secure storage in
    | Google Cloud Storage. It should be a 32-character random string,
    | or a base64-encoded value starting with "base64:".
    |
    */

    'key' => env('USER_PHOTOS_ENCRYPTION_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Cipher
    |--------------------------------------------------------------------------
    |
    | The encryption cipher to use. Normally "AES-256-CBC" or "AES-128-CBC".
    | This should match the key length (256-bit or 128-bit).
    |
    */

    'cipher' => env('USER_PHOTOS_ENCRYPTION_CIPHER', 'AES-256-CBC'),

];
