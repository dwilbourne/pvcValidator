<?php

namespace pvcTests\validator\val_tester\null;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\null_empty\IsNullTester;

class IsNullTest extends TestCase
{
    protected IsNullTester $tester;

    public function setUp(): void
    {
        $this->tester = new IsNullTester();
    }

    /**
     * @return void
     * @covers \pvc\validator\val_tester\null_empty\IsNullTester::testValue
     */
    public function testIsNull(): void
    {
        self::assertTrue($this->tester->testValue(null));
        self::assertFalse($this->tester->testValue(5));
    }
}
