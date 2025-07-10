<?php

namespace pvcTests\validator\val_tester\null;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\null_empty\IsNotNullTester;

class IsNotNullTest extends TestCase
{
    protected IsNotNullTester $tester;

    public function setUp(): void
    {
        $this->tester = new IsNotNullTester();
    }

    /**
     * @return void
     * @covers \pvc\validator\val_tester\null_empty\IsNotNullTester::testValue
     */
    public function testIsNotNull(): void
    {
        self::assertFalse($this->tester->testValue(null));
        self::assertTrue($this->tester->testValue(5));
    }

}
