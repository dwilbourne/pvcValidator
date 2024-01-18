<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\val_tester\list_choice;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\list_choice\ListChoiceValTester;
use stdClass;

class ListChoiceValTesterTest extends TestCase
{
    protected ListChoiceValTester $tester;

    protected array $choices;

    protected $testClass;

    public function setUp(): void
    {
        $this->tester = new ListChoiceValTester();
        $this->testClass = new StdClass();
        $this->choices = ['foo', 'bar', 5, $this->testClass];
        $this->tester->setChoices($this->choices);
    }

    /**
     * testSetGetChoices
     * @covers \pvc\validator\val_tester\list_choice\ListChoiceValTester::setChoices
     * @covers \pvc\validator\val_tester\list_choice\ListChoiceValTester::getChoices
     */
    public function testSetGetChoices(): void
    {
        self::assertEquals($this->choices, $this->tester->getChoices());
    }

    /**
     * testTestValueReturnsFalseWithInvalidChoice
     * @covers \pvc\validator\val_tester\list_choice\ListChoiceValTester::testValue
     */
    public function testTestValueReturnsFalseWithInvalidChoice(): void
    {
        self::assertFalse($this->tester->testValue('baz'));
        /**
         * note that object comparison only succeeds when the values are the sme instance
         */
        $class = new StdClass();
        self::assertFalse($this->tester->testValue($class));
    }

    /**
     * testTestValueReturnsTrueWithValidChoice
     * @covers \pvc\validator\val_tester\list_choice\ListChoiceValTester::testValue
     */
    public function testTestValueReturnsTrueWithValidChoice(): void
    {
        self::assertTrue($this->tester->testValue('foo'));
        /**
         * note that object comparison succeeds when the values are the sme instance
         */
        self::assertTrue($this->tester->testValue($this->testClass));
    }
}
