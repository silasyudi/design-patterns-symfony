<?php

namespace App\Facade;

use OpenSSLAsymmetricKey;

class Crypter
{

    public function encrypt(OpenSSLAsymmetricKey $privateKey, string $hashDocument): string
    {
        $signedDocument = '';
        openssl_private_encrypt($hashDocument, $signedDocument, $privateKey);
        return $signedDocument;
    }

    public function decrypt(OpenSSLAsymmetricKey $publicKey, string $signedDocument): string
    {
        $decryptedDocument = '';
        openssl_public_decrypt($signedDocument, $decryptedDocument, $publicKey);
        return $decryptedDocument;
    }
}
