<?php

namespace App\Facade;

class Hasher
{
    public function makeHash(string $document): string
    {
        return openssl_digest($document, 'sha256');
    }
}
