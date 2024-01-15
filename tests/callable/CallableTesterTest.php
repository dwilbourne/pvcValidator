<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\callable;

use PHPUnit\Framework\TestCase;
use pvc\testingutils\CallableMock;
use pvc\validator\callable\CallableTester;
use pvc\validator\ValTester;

class CallableTesterTest extends TestCase
{
    protected ValTester $valTester;

    protected CallableMock $callableMock;

    public function setUp(): void
    {
        $this->valTester = new CallableTester();
        $this->callableMock = new CallableMock();
    }

    /**
     * testSetGetCallable
     * @covers \pvc\validator\callable\CallableTester::setCallable
     * @covers \pvc\validator\callable\CallableTester::getCallable
     */
    public function testSetGetCallable(): void
    {
        $default = $this->valTester->getCallable();
        self::assertTrue(is_callable($default));

        $this->valTester->setCallable($this->callableMock);
        self::assertEquals($this->callableMock, $this->valTester->getCallable());
    }

    /**
     * testTestValueWithDefault
     * @covers \pvc\validator\callable\CallableTester::testValue
     */
    public function testTestValueWithCallableThatReturnsTrue(): void
    {
        $value = 'any_random_value';
        $callback = function () {
            return true;
        };
        $this->callableMock->setCallable($callback);
        self::assertTrue($this->valTester->testValue($value));
        /**
         * including null
         */
        self::assertTrue($this->valTester->testValue(null));
    }
}
