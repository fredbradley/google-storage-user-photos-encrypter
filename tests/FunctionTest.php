<?php

it('can encrypt and decrypt using facade', function () {
    config()->set('google-storage-user-photos-encrypter.key', random_bytes(32));

    $original = 'Hello world!';

    $encrypted = \FredBradley\GoogleStorageUserPhotosEncrypter\Facades\GoogleStorageUserPhotosEncrypter::encrypt($original);

    expect($encrypted)->not->toBe($original)
        ->and(\FredBradley\GoogleStorageUserPhotosEncrypter\Facades\GoogleStorageUserPhotosEncrypter::decrypt($encrypted))->toBe($original); // Ensure it actually changed
});
it('can encrypt and decrypt using OOP instance', function () {
    // Dynamically set the key for the test
    config()->set('google-storage-user-photos-encrypter.key', random_bytes(32));

    $original = 'Hello world!';

    // Instantiate the encrypter
    $encrypter = app(\FredBradley\GoogleStorageUserPhotosEncrypter\GoogleStorageUserPhotosEncrypter::class);

    $encrypted = $encrypter->encrypt($original);

    expect($encrypted)->not->toBe($original)
        ->and($encrypter->decrypt($encrypted))->toBe($original); // Ensure it's actually encrypted
});
