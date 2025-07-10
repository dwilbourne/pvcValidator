<?php

namespace pvcTests\validator\val_tester\null;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\null_empty\IsNotNull;

class IsNotNullTest extends TestCase
{
    protected IsNotNull $tester;

    public function setUp(): void
    {
        $this->tester = new IsNotNull();
    }

    /**
     * @return void
     * @covers \pvc\validator\val_tester\null_empty\IsNotNull::testValue
     */
    public function testIsNotNull(): void
    {
        self::assertFalse($this->tester->testValue(null));
        self::assertTrue($this->tester->testValue(5));
    }

}
