<?php

namespace App\Facade;

use OpenSSLAsymmetricKey;

class ValidatorFacade
{

    private Hasher $hasher;
    private Crypter $crypter;

    public function __construct(Hasher $hasher, Crypter $crypter)
    {
        $this->hasher = $hasher;
        $this->crypter = $crypter;
    }

    public function validateSignature(
        OpenSSLAsymmetricKey $publicKey,
        string $originalDocument,
        string $signedDocument
    ): bool {
        $decrypt = $this->crypter->decrypt($publicKey, $signedDocument);
        $hashDocument = $this->hasher->makeHash($originalDocument);
        return $decrypt === $hashDocument;
    }
}
