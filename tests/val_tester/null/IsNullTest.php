<?php

namespace pvcTests\validator\val_tester\null;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\null\IsNull;

class IsNullTest extends TestCase
{
    protected IsNull $tester;

    public function setUp(): void
    {
        $this->tester = new IsNull();
    }

    /**
     * @return void
     * @covers \pvc\validator\val_tester\null\IsNull::testValue
     */
    public function testIsNull(): void
    {
        self::assertTrue($this->tester->testValue(null));
        self::assertFalse($this->tester->testValue(5));
    }
}
