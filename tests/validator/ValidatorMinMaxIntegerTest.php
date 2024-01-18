<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\validator;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\msg\MsgInterface;
use pvc\validator\val_tester\min_max\MinMaxIntegerTester;
use pvc\validator\validator\ValidatorMinMaxInteger;

class ValidatorMinMaxIntegerTest extends TestCase
{
    protected MsgInterface|MockObject $msg;

    protected MinMaxIntegerTester|MockObject $tester;

    protected ValidatorMinMaxInteger $validatorMinMaxInteger;

    public function setUp(): void
    {
        $this->msg = $this->createMock(MsgInterface::class);
        $this->tester = $this->createMock(MinMaxIntegerTester::class);
        $this->validatorMinMaxInteger = new ValidatorMinMaxInteger($this->msg, $this->tester);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\validator\ValidatorMinMaxInteger::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(ValidatorMinMaxInteger::class, $this->validatorMinMaxInteger);
    }

    /**
     * testSetGetValTester
     * @covers \pvc\validator\validator\ValidatorMinMaxInteger::setValTester
     * @covers \pvc\validator\validator\ValidatorMinMaxInteger::getValTester
     */
    public function testSetGetValTester(): void
    {
        $mock = $this->createMock(MinMaxIntegerTester::class);
        $this->validatorMinMaxInteger->setValTester($mock);
        self::assertEquals($mock, $this->validatorMinMaxInteger->getValTester());
    }

    /**
     * testValidatorSetsMsgContentOnFailure
     * @covers \pvc\validator\validator\ValidatorMinMaxInteger::setMsgContent
     * @covers \pvc\validator\validator\ValidatorMinMaxInteger::testValue
     */
    public function testValidatorSetsMsgContentOnFailure(): void
    {
        $this->tester->method('testValue')->willReturn(false);
        $this->msg->expects($this->once())->method('setContent');
        $testData = 'foo';
        $this->validatorMinMaxInteger->validate($testData);
    }
}
