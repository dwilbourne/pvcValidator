<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\msg\DomainCatalogLoaderInterface;
use pvc\interfaces\msg\MsgInterface;
use pvc\validator\Validator;

class ValidatorTest extends TestCase
{
    protected MsgInterface|MockObject $msg;

    protected Validator $validator;

    public function setUp(): void
    {
        $this->msg = $this->createMock(MsgInterface::class);

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
        $this->validator->setMsg($this->msg);
        self::assertEquals($this->msg, $this->validator->getMsg());
    }

    /**
     * @return void
     * @covers \pvc\validator\Validator::getDomainCatalogLoader
     */
    public function testGetCatalogLoader(): void
    {
        self::assertInstanceOf(DomainCatalogLoaderInterface::class, $this->validator->getDomainCatalogLoader());
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
                                ->setConstructorArgs([$this->msg])
                                ->getMockForAbstractClass();
        self::assertEquals($this->msg, $this->validator->getMsg());
        self::assertTrue($this->validator->isRequired());
    }

    /**
     * testValidateClearsMessageEachTimeItRuns
     * @covers \pvc\validator\Validator::validate
     */
    public function testValidateClearsMessageEachTimeItRuns()
    {
        $this->validator = $this->getMockBuilder(Validator::class)
                                ->setConstructorArgs([$this->msg])
                                ->getMockForAbstractClass();
        $this->msg->expects($this->once())->method('clearContent');
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
                                ->setConstructorArgs([$this->msg])
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
                                ->setConstructorArgs([$this->msg])
                                ->getMockForAbstractClass();
        $this->msg->expects($this->once())->method('setContent');
        $this->validator->setRequired(true);
        $this->validator->method('testValue')->willReturn(false);
        self::assertFalse($this->validator->validate(null));
    }

    /**
     * testValidateReturnsFalseAndSetsMsgIfValTesterFails
     * @covers \pvc\validator\Validator::validate
     */
    public function testValidateReturnsFalseAndSetsMsgIfValTesterFails(): void
    {
        $this->validator = $this->getMockBuilder(Validator::class)
                                ->setConstructorArgs([$this->msg])
                                ->getMockForAbstractClass();
        $this->validator->method('testValue')->willReturn(false);
        $this->validator->expects($this->once())->method('setMsgContent');
        $testValue = 'foo';
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
                                ->setConstructorArgs([$this->msg])
                                ->getMockForAbstractClass();
        $this->validator->method('testValue')->with($testValue)->willReturn(true);
        self::assertTrue($this->validator->validate($testValue));
    }
}
