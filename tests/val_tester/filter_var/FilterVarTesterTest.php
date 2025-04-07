<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\validator\val_tester\filter_var;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\filtervar\FilterVarValidateInterface;
use pvc\validator\val_tester\filter_var\FilterVarTester;

/**
 * Class FilterVarTesterTest
 */
class FilterVarTesterTest extends TestCase
{
    protected FilterVarValidateInterface|MockObject $filterVar;

    protected FilterVarTester $tester;
    public function setUp(): void
    {
        $this->filterVar = $this->createMock(FilterVarValidateInterface::class);
        $this->tester = new FilterVarTester($this->filterVar);
        $this->tester->setFilterVar($this->filterVar);
    }

    /**
     * testSetGetFilterVar
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::__construct
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::setFilterVar
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::getFilterVar
     */
    public function testSetGetFilterVar(): void
    {
        self::assertInstanceOf(FilterVarValidateInterface::class, $this->tester->getFilterVar());
        $filterVar = $this->createMock(FilterVarValidateInterface::class);
        $this->tester->setFilterVar($filterVar);
        self::assertEquals($filterVar, $this->tester->getFilterVar());
    }

    /**
     * testValidateSucceeds
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::testValue
     */
    public function testValidateSucceeds(): void
    {
        $testValueThatSucceeds = 'foo';
        $this->filterVar->method('validate')->with($testValueThatSucceeds)->willReturn(true);
        self::assertTrue($this->tester->testValue($testValueThatSucceeds));
    }

    /**
     * testValidateFails
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::testValue
     */
    public function testValidateFails(): void
    {
        $testValueThatFails = 'foo';
        $this->filterVar->method('validate')->with($testValueThatFails)->willReturn(false);
        self::assertFalse($this->tester->testValue($testValueThatFails));
    }
}
