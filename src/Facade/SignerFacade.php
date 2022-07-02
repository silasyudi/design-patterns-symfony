<?php

namespace App\Facade;

use OpenSSLAsymmetricKey;

class SignerFacade
{

    private Hasher $hasher;
    private Crypter $crypter;

    public function __construct(Hasher $hasher, Crypter $crypter)
    {
        $this->hasher = $hasher;
        $this->crypter = $crypter;
    }

    public function signDocument(OpenSSLAsymmetricKey $privateKey, string $document): string
    {
        $hashDocument = $this->hasher->makeHash($document);
        return $this->crypter->encrypt($privateKey, $hashDocument);
    }
}
