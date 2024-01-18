<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\validator;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\msg\MsgInterface;
use pvc\validator\val_tester\regex\RegexTester;
use pvc\validator\validator\ValidatorRegex;

class ValidatorRegexTest extends TestCase
{
    protected MsgInterface|MockObject $msg;

    protected RegexTester|MockObject $regexTester;

    protected ValidatorRegex $validatorRegex;

    public function setUp(): void
    {
        $this->msg = $this->createMock(MsgInterface::class);
        $this->regexTester = $this->createMock(RegexTester::class);
        $this->validatorRegex = new ValidatorRegex($this->msg, $this->regexTester);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\validator\ValidatorRegex::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(ValidatorRegex::class, $this->validatorRegex);
    }

    /**
     * testSetGetRegexTester
     * @covers \pvc\validator\validator\ValidatorRegex::setRegexTester
     * @covers \pvc\validator\validator\ValidatorRegex::getRegexTester
     */
    public function testSetGetRegexTester(): void
    {
        $mock = $this->createMock(RegexTester::class);
        $this->validatorRegex->setRegexTester($mock);
        self::assertEquals($mock, $this->validatorRegex->getRegexTester());
    }

    /**
     * testValidatorSetsMsgContentOnFailure
     * @covers \pvc\validator\validator\ValidatorRegex::setMsgContent
     * @covers \pvc\validator\validator\ValidatorRegex::testValue
     */
    public function testValidatorSetsMsgContentOnFailure(): void
    {
        $this->regexTester->method('testValue')->willReturn(false);
        $this->msg->expects($this->once())->method('setContent');
        $testData = 'foo';
        $this->validatorRegex->validate($testData);
    }

}
