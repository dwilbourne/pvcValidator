<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\validator;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\msg\MsgInterface;
use pvc\validator\val_tester\min_max\MinMaxFloatTester;
use pvc\validator\validator\ValidatorMinMaxFloat;

class ValidatorMinMaxFloatTest extends TestCase
{
    protected MsgInterface|MockObject $msg;

    protected MinMaxFloatTester $minMaxFloatTester;

    protected ValidatorMinMaxFloat $validatorMinMaxFloat;

    public function setUp(): void
    {
        $this->msg = $this->createMock(MsgInterface::class);
        $this->minMaxFloatTester = $this->createMock(MinMaxFloatTester::class);
        $this->validatorMinMaxFloat = new ValidatorMinMaxFloat($this->msg, $this->minMaxFloatTester);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\validator\ValidatorMinMaxFloat::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(ValidatorMinMaxFloat::class, $this->validatorMinMaxFloat);
    }

    /**
     * testSetGetMinMaxFloatTester
     * @covers \pvc\validator\validator\ValidatorMinMaxFloat::setValTester
     * @covers \pvc\validator\validator\ValidatorMinMaxFloat::getValTester
     */
    public function testSetGetMinMaxFloatTester(): void
    {
        $mock = $this->createMock(MinMaxFloatTester::class);
        $this->validatorMinMaxFloat->setValTester($mock);
        self::assertEquals($mock, $this->validatorMinMaxFloat->getValTester());
    }

    /**
     * testValidatorSetsMsgContentOnFailure
     * @covers \pvc\validator\validator\ValidatorMinMaxFloat::setMsgContent
     * @covers \pvc\validator\validator\ValidatorMinMaxFloat::testValue
     */
    public function testValidatorSetsMsgContentOnFailure(): void
    {
        $this->minMaxFloatTester->method('testValue')->willReturn(false);
        $this->msg->expects($this->once())->method('setContent');
        $testData = 'foo';
        $this->validatorMinMaxFloat->validate($testData);
    }
}
