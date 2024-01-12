<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\callable;

use PHPUnit\Framework\TestCase;
use pvc\testingutils\CallableMock;
use pvc\validator\callable\CallableTester;
use pvc\validator\err\InvalidLabelException;
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

    /**
     * testSetGetMsgId
     * @covers \pvc\validator\ValTester::setMsgId
     * @covers \pvc\validator\ValTester::getMsgId
     */
    public function testSetGetMsgId(): void
    {
        $msgId = 'some_string';
        $this->valTester->setMsgId($msgId);
        self::assertEquals($msgId, $this->valTester->getMsgId());
    }


    /**
     * testSetGetAddMsgParameters
     * @covers \pvc\validator\ValTester::getMsgParameters
     * @covers \pvc\validator\ValTester::setMsgParameters
     * @covers \pvc\validator\ValTester::addMsgParameter
     */
    public function testSetGetAddMsgParameters(): void
    {
        $expectedMsgParams = ['foo' => 9, 'bar' => 'some_string'];
        $this->valTester->setMsgParameters($expectedMsgParams);
        self::assertEquals($expectedMsgParams, $this->valTester->getMsgParameters());

        $this->valTester->addMsgParameter('baz', true);
        $expectedMsgParams['baz'] = true;
        $this->valTester->addMsgParameter('quux', 'some_other_string');
        $expectedMsgParams['quux'] = 'some_other_string';
        self::assertEquals($expectedMsgParams, $this->valTester->getMsgParameters());
    }

    /**
     * testSetLabelThrowsExceptionWithEmptyString
     * @throws InvalidLabelException
     * @covers \pvc\validator\callable\CallableTester::setLabel
     */
    public function testSetLabelThrowsExceptionWithEmptyString(): void
    {
        self::expectException(InvalidLabelException::class);
        $this->valTester->setLabel('');
    }

    /**
     * testSetGetLabel
     * @throws InvalidLabelException
     * @covers \pvc\validator\callable\CallableTester::setLabel
     * @covers \pvc\validator\callable\CallableTester::getLabel
     */
    public function testSetGetLabel(): void
    {
        $label = 'foo';
        $this->valTester->setLabel($label);
        self::assertEquals($label, $this->valTester->getLabel());
    }
}
