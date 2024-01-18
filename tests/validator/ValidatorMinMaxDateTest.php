<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\validator;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\msg\MsgInterface;
use pvc\validator\val_tester\min_max\MinMaxDateTester;
use pvc\validator\validator\ValidatorMinMaxDate;

class ValidatorMinMaxDateTest extends TestCase
{
    protected ValidatorMinMaxDate $validatorMinMaxDate;

    protected MsgInterface|MockObject $msg;

    protected MinMaxDateTester|MockObject $tester;

    public function setUp(): void
    {
        $this->msg = $this->createMock(MsgInterface::class);
        $this->tester = $this->createMock(MinMaxDateTester::class);
        $this->validatorMinMaxDate = new ValidatorMinMaxDate($this->msg, $this->tester);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\validator\ValidatorMinMaxDate::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(ValidatorMinMaxDate::class, $this->validatorMinMaxDate);
    }

    /**
     * testSetGetValTester
     * @covers \pvc\validator\validator\ValidatorMinMaxDate::setValTester
     * @covers \pvc\validator\validator\ValidatorMinMaxDate::getValTester
     */
    public function testSetGetValTester(): void
    {
        $mock = $this->createMock(MinMaxDateTester::class);
        $this->validatorMinMaxDate->setValTester($mock);
        self::assertEquals($mock, $this->validatorMinMaxDate->getValTester());
    }

    /**
     * testValidatorSetsMsgContentOnFailure
     * @covers \pvc\validator\validator\ValidatorMinMaxDate::setMsgContent
     * @covers \pvc\validator\validator\ValidatorMinMaxDate::testValue
     */
    public function testValidatorSetsMsgContentOnFailure(): void
    {
        $this->tester->method('testValue')->willReturn(false);
        $this->msg->expects($this->once())->method('setContent');
        $testData = 'foo';
        $this->validatorMinMaxDate->validate($testData);
    }
}
