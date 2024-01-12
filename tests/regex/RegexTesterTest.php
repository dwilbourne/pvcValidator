<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\validator\regex;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\regex\RegexInterface;
use pvc\interfaces\validator\ValTesterInterface;
use pvc\regex\Regex;
use pvc\validator\err\InvalidLabelException;
use pvc\validator\regex\RegexTester;
use pvcTests\validator\ValTesterTest;

/**
 * Class ValidatorRegexTest
 */
class RegexTesterTest extends TestCase
{

    protected RegexInterface|MockObject $regex;

    protected ValTesterInterface|RegexTester $tester;

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
     * testSetLabelThrowsExceptionWuthEmptyLabel
     * @throws InvalidLabelException
     * @covers \pvc\validator\regex\RegexTester::setLabel
     */
    public function testSetLabelThrowsExceptionWuthEmptyLabel(): void
    {
        self::expectException(InvalidLabelException::class);
        $this->tester->setLabel('');
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

    /**
     * testGetMsgId
     * @covers \pvc\validator\regex\RegexTester::getMsgId()
     */
    public function testGetMsgId(): void
    {
        self::assertIsString($this->tester->getMsgId());
        $messages = include(__DIR__ . '\..\..\src\messages\ValidatorMessages.en.php');
        self::assertTrue(array_key_exists($this->tester->getMsgId(), $messages));
    }

    /**
     * testGetMsgParameters
     * @throws \pvc\validator\err\InvalidLabelException
     * @covers \pvc\validator\regex\RegexTester::getMsgParameters()
     */
    public function testGetMsgParameters(): void
    {
        $label = 'label';

        $this->regex->expects($this->once())->method('setLabel')->with($label);
        $this->regex->expects($this->once())->method('getLabel')->willReturn($label);
        $this->tester->setLabel($label);

        $params = $this->tester->getMsgParameters();
        foreach ($params as $key => $value) {
            self::assertIsString($key);
            self::assertEquals($label, $value);
        }
    }


    /**
     * testFluentSetters
     * @covers \pvc\validator\regex\RegexTester::setRegex
     * @covers \pvc\validator\regex\RegexTester::setLabel
     * @covers \pvc\validator\regex\RegexTester::setPattern
     */
    public function testFluentSetters(): void
    {
        $pattern = '/foo/';
        $label = 'label';
        $regex = $this->createMock(Regex::class);
        $regex->expects($this->once())->method('setLabel')->with($label);
        $regex->method('getLabel')->willReturn($label);
        $regex->expects($this->once())->method('setPattern')->with($pattern);
        $regex->method('getPattern')->willReturn($pattern);
        $this->tester->setRegex($regex)->setLabel($label)->setPattern($pattern);
        self::assertEquals($regex, $this->tester->getRegex());
        self::assertEquals($pattern, $this->tester->getPattern());
        self::assertEquals($label, $this->tester->getLabel());
    }
}
