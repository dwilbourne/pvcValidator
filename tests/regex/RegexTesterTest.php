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
        $this->tester = new RegexTester();
        $this->tester->setRegex($this->regex);
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

    /**
     * testSetGetPattern
     * @covers \pvc\validator\regex\RegexTester::setPattern
     * @covers \pvc\validator\regex\RegexTester::getPattern
     */
    public function testSetGetPattern(): void
    {
        $pattern = '/foo/';
        $this->regex->expects($this->once())->method('setPattern')->with($pattern);
        $this->regex->method('getPattern')->willReturn($pattern);
        $this->tester->setPattern($pattern);
        self::assertEquals($pattern, $this->tester->getPattern());
    }

    /**
     * testSetGetLabel
     * @covers \pvc\validator\regex\RegexTester::setLabel
     * @covers \pvc\validator\regex\RegexTester::getLabel
     */
    public function testSetGetLabel(): void
    {
        $label = 'label';
        $this->regex->expects($this->once())->method('setLabel')->with($label);
        $this->regex->method('getLabel')->willReturn($label);
        $this->tester->setLabel($label);
        self::assertEquals($label, $this->tester->getLabel());
    }
}
