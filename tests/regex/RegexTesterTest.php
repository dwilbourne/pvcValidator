<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\validator\regex;

use PHPUnit\Framework\MockObject\MockObject;
use pvc\interfaces\regex\RegexInterface;
use pvc\validator\regex\RegexTester;
use pvcTests\validator\ValTesterMaster;

/**
 * Class ValidatorRegexTest
 */
class RegexTesterTest extends ValTesterMaster
{

    protected RegexInterface|MockObject $regex;

    public function setUp(): void
    {
        $this->regex = $this->createMock(RegexInterface::class);
        $this->tester = new RegexTester($this->regex);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\regex\RegexTester::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(RegexTester::class, $this->tester);
    }

    /**
     * testSetGetRegex
     * @covers \pvc\validator\regex\RegexTester::setRegex
     * @covers \pvc\validator\regex\RegexTester::getRegex
     */
    public function testSetGetRegex(): void
    {
        $regex = $this->createMock(RegexInterface::class);
        $this->tester->setRegex($regex);
        self::assertEquals($regex, $this->tester->getRegex());
    }

    /**
     * testValidateSucceeds
     * @covers \pvc\validator\regex\RegexTester::testValue
     *
     */
    public function testValidateSucceeds(): void
    {
        $testValueThatSucceeds = 'foo';
        $this->regex->method('match')->with($testValueThatSucceeds)->willReturn(true);
        self::assertTrue($this->tester->testValue($testValueThatSucceeds));
    }

    /**
     * testValidateFails
     * @covers \pvc\validator\regex\RegexTester::testValue
     */
    public function testValidateFails(): void
    {
        $testValueThatFails = 'bar';
        $this->regex->method('match')->with($testValueThatFails)->willReturn(false);
        self::assertFalse($this->tester->testValue($testValueThatFails));
    }
}
