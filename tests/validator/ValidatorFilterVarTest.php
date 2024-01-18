<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\validator;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\filtervar\FilterVarValidateInterface;
use pvc\interfaces\msg\MsgInterface;
use pvc\validator\validator\ValidatorFilterVar;

class ValidatorFilterVarTest extends TestCase
{
    protected ValidatorFilterVar $validatorFilterVar;

    protected MsgInterface|MockObject $msg;
    protected FilterVarValidateInterface|MockObject $tester;

    public function setUp(): void
    {
        $this->msg = $this->createMock(MsgInterface::class);
        $this->tester = $this->createMock(FilterVarValidateInterface::class);
        $this->validatorFilterVar = new ValidatorFilterVar($this->msg, $this->tester);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\validator\ValidatorFilterVar::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(ValidatorFilterVar::class, $this->validatorFilterVar);
    }

    /**
     * testSetGetValTester
     * @covers \pvc\validator\validator\ValidatorFilterVar::setValTester
     * @covers \pvc\validator\validator\ValidatorFilterVar::getValTester
     */
    public function testSetGetValTester(): void
    {
        $mock = $this->createMock(FilterVarValidateInterface::class);
        $this->validatorFilterVar->setValTester($mock);
        self::assertEquals($mock, $this->validatorFilterVar->getValTester());
    }

    /**
     * testValidatorSetsMsgContentOnFailure
     * @covers \pvc\validator\validator\ValidatorFilterVar::setMsgContent
     * @covers \pvc\validator\validator\ValidatorFilterVar::testValue
     */
    public function testValidatorSetsMsgContentOnFailure(): void
    {
        $this->tester->method('validate')->willReturn(false);
        $this->msg->expects($this->once())->method('setContent');
        $testData = 'foo';
        $this->validatorFilterVar->validate($testData);
    }
}
