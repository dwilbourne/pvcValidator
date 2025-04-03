<?php

namespace messages;

use PHPUnit\Framework\TestCase;
use pvc\validator\messages\ValidatorCatalogLoader;

class ValidatorCatalogLoaderTest extends TestCase
{
    /**
     * @return void
     * @covers \pvc\validator\messages\ValidatorCatalogLoader::__construct
     */
    public function testConstructor(): void
    {
        $validator = new ValidatorCatalogLoader();
        self::assertInstanceOf(ValidatorCatalogLoader::class, $validator);
        self::assertIsString($validator->getDomainCatalogDirectory());
    }
}
