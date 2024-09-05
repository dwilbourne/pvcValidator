<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\val_tester\callable;

use PHPUnit\Framework\TestCase;
use pvc\interfaces\validator\ValTesterInterface;
use pvc\testingutils\CallableMock;
use pvc\validator\val_tester\callable\CallableTester;

class CallableTesterTest extends TestCase
{
    protected ValTesterInterface $valTester;

    protected CallableMock $callableMock;

    public function setUp(): void
    {
        $this->callableMock = new CallableMock();
        $this->valTester = new CallableTester($this->callableMock);
    }

    /**
     * testConstructSetGetCallable
     * @covers \pvc\validator\val_tester\callable\CallableTester::__construct
     * @covers \pvc\validator\val_tester\callable\CallableTester::setCallable
     * @covers \pvc\validator\val_tester\callable\CallableTester::getCallable
     */
    public function testConstructSetGetCallable(): void
    {
        self::assertInstanceOf(CallableTester::class, $this->valTester);
        self::assertEquals($this->callableMock, $this->valTester->getCallable());
    }

    /**
     * testTestValueWithCallable
     * @covers \pvc\validator\val_tester\callable\CallableTester::testValue
     */
    public function testTestValueWithCallable(): void
    {
        $value = 'anyRandomValue';
        $callback = 'ctype_alnum';
        $this->valTester->setCallable($callback);
        self::assertTrue($this->valTester->testValue($value));
    }
}
