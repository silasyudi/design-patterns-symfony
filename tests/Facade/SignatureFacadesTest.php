<?php

namespace App\Tests\Facade;

use App\Facade\SignerFacade;
use App\Facade\ValidatorFacade;
use OpenSSLAsymmetricKey;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SignatureFacadesTest extends KernelTestCase
{
    private SignerFacade $signerFacade;
    private ValidatorFacade $validatorFacade;

    private OpenSSLAsymmetricKey $privateKey;
    private OpenSSLAsymmetricKey $publicKey;

    public function setUp(): void
    {
        self::bootKernel();
        $this->signerFacade = self::$kernel->getContainer()->get(SignerFacade::class);
        $this->validatorFacade = self::$kernel->getContainer()->get(ValidatorFacade::class);

        $this->privateKey = openssl_pkey_new();
        $publicKeyPem = openssl_pkey_get_details($this->privateKey)['key'];
        $this->publicKey = openssl_pkey_get_public($publicKeyPem);
    }

    public function testSignAndValidateDocument(): void
    {
        $document = 'ILoveDesignPatterns';
        $signedDocument = $this->signerFacade->signDocument($this->privateKey, $document);
        $isValid = $this->validatorFacade->validateSignature(
            $this->publicKey,
            $document,
            $signedDocument
        );
        $this->assertTrue($isValid);
    }
}
