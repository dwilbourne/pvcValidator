<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare (strict_types=1);

namespace pvcTests\validator\val_tester\parser;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\parser\ParserInterface;
use pvc\validator\val_tester\parser\ParserTester;

class ParserTesterTest extends TestCase
{
    protected ParserInterface|MockObject $parser;

    protected ParserTester $tester;

    public function setUp(): void
    {
        $this->parser = $this->createStub(ParserInterface::class);
        $this->tester = new ParserTester($this->parser);
    }

    /**
     * testSetGetParser
     * @covers \pvc\validator\val_tester\parser\ParserTester::__construct
     * @covers \pvc\validator\val_tester\parser\ParserTester::setParser
     * @covers \pvc\validator\val_tester\parser\ParserTester::getParser
     */
    public function testConstructorSetGetParser(): void
    {
        self::assertEquals($this->parser, $this->tester->getParser());
    }

    /**
     * testTestValueFalse
     * @covers \pvc\validator\val_tester\parser\ParserTester::testValue
     */
    public function testTestValueFalse(): void
    {
        $testInput = 'foo';
        $expectedValue = false;
        $this->parser->method('parse')->willReturn($expectedValue);
        $this->tester->setParser($this->parser);
        self::assertEquals($expectedValue, $this->tester->testValue($testInput));
    }

    /**
     * testTestValueTrue
     * @covers \pvc\validator\val_tester\parser\ParserTester::testValue
     */
    public function testTestValueTrue(): void
    {
        $testInput = 'foo';
        $expectedValue = true;
        $this->parser->method('parse')->willReturn($expectedValue);
        $this->tester->setParser($this->parser);
        self::assertEquals($expectedValue, $this->tester->testValue($testInput));
    }

}
