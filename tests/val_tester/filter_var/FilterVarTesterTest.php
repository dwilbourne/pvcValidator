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
use pvc\validator\err\InvalidLabelException;
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
    }

    /**
     * testConstruct
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(FilterVarTester::class, $this->tester);
    }

    /**
     * testSetGetFilterVar
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::setFilterVar
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::getFilterVar
     */
    public function testSetGetFilterVar(): void
    {
        $filterVar = $this->createMock(FilterVarValidateInterface::class);
        $this->tester->setFilterVar($filterVar);
        self::assertEquals($filterVar, $this->tester->getFilterVar());
    }

    /**
     * testSetFilter
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::setFilter()
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::getFilter()
     */
    public function testSetGetFilter(): void
    {
        $dummyFilter = 5;
        $this->filterVar->expects($this->once())->method('setFilter')->with($dummyFilter);
        $this->filterVar->expects($this->once())->method('getFilter')->willReturn($dummyFilter);
        $this->tester->setFilter($dummyFilter);
        self::assertEquals($dummyFilter, $this->tester->getFilter());
    }

    /**
     * testSetLabelThrowsExceptionWithEmptyLabel
     * @throws InvalidLabelException
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::setLabel
     */
    public function testSetLabelThrowsExceptionWithEmptyLabel(): void
    {
        self::expectException(InvalidLabelException::class);
        $this->tester->setLabel('');
    }

    /**
     * testSetGetLabel
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::setLabel
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::getLabel
     */
    public function testSetGetLabel(): void
    {
        $label = 'label';
        $this->filterVar->expects($this->once())->method('setLabel')->with($label);
        $this->filterVar->method('getLabel')->willReturn($label);
        $this->tester->setLabel($label);
        self::assertEquals($label, $this->tester->getLabel());
    }

    /**
     * testAddOption
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::addOption
     */
    public function testAddOption(): void
    {
        $option = 'default';
        $value = 3;
        $this->filterVar->expects($this->once())->method('addOption')->with($option, $value);
        $this->tester->addOption($option, $value);
    }

    /**
     * testAddFlag
     * @covers \pvc\validator\val_tester\filter_var\FilterVarTester::addFlag
     */
    public function testAddFlag(): void
    {
        $flag = FILTER_FLAG_EMAIL_UNICODE;
        $this->filterVar->expects($this->once())->method('addFlag')->with($flag);
        $this->tester->addFlag($flag);
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
