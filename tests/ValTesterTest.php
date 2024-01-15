<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator;

use PHPUnit\Framework\TestCase;
use pvc\validator\err\InvalidMsgIdException;
use pvc\validator\ValTester;

class ValTesterTest extends TestCase
{
    protected ValTester $tester;

    public function setUp(): void
    {
        $this->tester = $this->getMockForAbstractClass(ValTester::class);
    }

    /**
     * testSetMsgIdThrowsExceptionWithUnknownMsgId
     * @throws InvalidMsgIdException
     * @covers \pvc\validator\ValTester::setMsgId
     */
    public function testSetMsgIdThrowsExceptionWithUnknownMsgId(): void
    {
        $msgId = 'foo';
        self::expectException(InvalidMsgIdException::class);
        $this->tester->setMsgId($msgId);
    }

    /**
     * testGetMsgId
     */
    public function testSetGetMsgId(): void
    {
        $msgId = 'null_msg';
        $this->tester->setMsgId($msgId);
        self::assertEquals($msgId, $this->tester->getMsgId());
    }

    /**
     * testSetGetMsgParametersWithEmptyArray
     * @covers \pvc\validator\ValTester::setMsgParameters
     * @covers \pvc\validator\ValTester::getMsgParameters
     */
    public function testSetGetMsgParametersWithEmptyArray(): void
    {
        $parameters = [];
        $this->tester->setMsgParameters($parameters);
        self::assertEquals($parameters, $this->tester->getMsgParameters());
    }

    /**
     * testSetGetMsgParameters
     * @covers \pvc\validator\ValTester::setMsgParameters
     * @covers \pvc\validator\ValTester::addMsgParameter
     * @covers \pvc\validator\ValTester::getMsgParameters
     */
    public function testSetGetParameters(): void
    {
        $parameters = ['foo' => 'bar', 'baz' => 6];
        $this->tester->setMsgParameters($parameters);
        self::assertEqualsCanonicalizing($parameters, $this->tester->getMsgParameters());
    }
}
