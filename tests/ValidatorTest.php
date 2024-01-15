<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\msg\MsgInterface;
use pvc\interfaces\validator\ValTesterInterface;
use pvc\validator\messages\ValidatorMsg;
use pvc\validator\Validator;

class ValidatorTest extends TestCase
{
    protected MsgInterface|MockObject $validatorMsg;

    protected ValTesterInterface|MockObject $valTester;

    protected Validator $validator;

    public function setUp(): void
    {
        $this->validatorMsg = $this->createMock(ValidatorMsg::class);
        $this->valTester = $this->createMock(ValTesterInterface::class);
        $this->validator = $this->getMockBuilder(Validator::class)
                                ->disableOriginalConstructor()
                                ->getMockForAbstractClass();
    }

    /**
     * testSetGetMsg
     * @covers \pvc\validator\Validator::setMsg
     * @covers \pvc\validator\Validator::getMsg
     */
    public function testSetGetMsg()
    {
        $this->validator->setMsg($this->validatorMsg);
        self::assertEquals($this->validatorMsg, $this->validator->getMsg());
    }

    /**
     * testSetGetValTester
     * @covers \pvc\validator\Validator::setValTester
     * @covers \pvc\validator\Validator::getValTester
     */
    public function testSetGetValTester()
    {
        $this->validator->setValTester($this->valTester);
        self::assertEquals($this->valTester, $this->validator->getValTester());
    }

    /**
     * testSetRequiredIsRequired
     * @covers \pvc\validator\Validator::setRequired
     * @covers \pvc\validator\Validator::isRequired
     */
    public function testSetRequiredIsRequired()
    {
        $this->validator->setRequired(true);
        self::assertTrue($this->validator->isRequired());
        $this->validator->setRequired(false);
        self::assertFalse($this->validator->isRequired());
    }

    /**
     * testConstruct
     * @covers \pvc\validator\Validator::__construct
     */
    public function testConstruct()
    {
        $this->validator = $this->getMockBuilder(Validator::class)
                                ->setConstructorArgs([$this->validatorMsg])
                                ->getMockForAbstractClass();
        self::assertEquals($this->validatorMsg, $this->validator->getMsg());
        self::assertTrue($this->validator->isRequired());
    }

    /**
     * testValidateClearsMessageEachTimeItRuns
     * @covers \pvc\validator\Validator::validate
     */
    public function testValidateClearsMessageEachTimeItRuns()
    {
        $this->validator = $this->getMockBuilder(Validator::class)
                                ->setConstructorArgs([$this->validatorMsg, $this->valTester])
                                ->getMockForAbstractClass();
        $this->validatorMsg->expects($this->once())->method('clearContent');
        $this->validator->setRequired(false);
        $this->validator->validate(null);
    }

    /**
     * testValidateReturnsTrueWhenRequiredIsFalseAndNullIsTested
     * @covers \pvc\validator\Validator::validate
     */
    public function testValidateReturnsTrueWhenRequiredIsFalseAndNullIsTested(): void
    {
        $this->validator = $this->getMockBuilder(Validator::class)
                                ->setConstructorArgs([$this->validatorMsg, $this->valTester])
                                ->getMockForAbstractClass();
        $this->validator->setRequired(false);
        self::assertTrue($this->validator->validate(null));
    }

    /**
     * testValidateReturnsFalseAndMsgIsSetWhenRequiredIsTrueAndNullIsTested
     * @covers \pvc\validator\Validator::validate
     */
    public function testValidateReturnsFalseAndMsgIsSetWhenRequiredIsTrueAndNullIsTested(): void
    {
        $this->validator = $this->getMockBuilder(Validator::class)
                                ->setConstructorArgs([$this->validatorMsg, $this->valTester])
                                ->getMockForAbstractClass();
        $this->validatorMsg->expects($this->once())->method('setContent');
        $this->validator->setRequired(true);
        self::assertFalse($this->validator->validate(null));
    }

    /**
     * testValidateReturnsFalseAndSetsMsgIfValTesterFails
     * @covers \pvc\validator\Validator::validate
     */
    public function testValidateReturnsFalseAndSetsMsgIfValTesterFails(): void
    {
        $testMsgId = 'foo';
        $testMsgParameters = [];
        $testValue = 'bar';

        $this->validator = $this->getMockBuilder(Validator::class)
                                ->setConstructorArgs([$this->validatorMsg])
                                ->getMockForAbstractClass();
        $this->validator->setValTester($this->valTester);

        $this->valTester->method('testValue')->with($testValue)->willReturn(false);
        $this->valTester->expects($this->once())->method('getMsgId')->willReturn($testMsgId);
        $this->valTester->expects($this->once())->method('getMsgParameters')->willReturn($testMsgParameters);

        $this->validatorMsg->expects($this->once())->method('setContent')->with($testMsgId, $testMsgParameters);

        self::assertFalse($this->validator->validate($testValue));
    }

    /**
     * testValidateReturnsTrue
     * @covers \pvc\validator\Validator::validate
     */
    public function testValidateReturnsTrue(): void
    {
        $testValue = 'bar';

        $this->validator = $this->getMockBuilder(Validator::class)
                                ->setConstructorArgs([$this->validatorMsg])
                                ->getMockForAbstractClass();
        $this->validator->setValTester($this->valTester);
        $this->valTester->method('testValue')->with($testValue)->willReturn(true);
        self::assertTrue($this->validator->validate($testValue));
    }
}
