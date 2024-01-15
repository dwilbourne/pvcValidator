<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\validator\filter_var;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\filtervar\FilterVarValidate;
use pvc\validator\err\InvalidLabelException;
use pvc\validator\filter_var\FilterVarTester;

/**
 * Class FilterVarTesterTest
 */
class FilterVarTesterTest extends TestCase
{
    protected FilterVarValidate|MockObject $filterVar;

    protected FilterVarTester $tester;
    public function setUp(): void
    {
        $this->tester = new FilterVarTester();
        $this->filterVar = $this->createMock(FilterVarValidate::class);
        $this->tester->setFilterVar($this->filterVar);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\filter_var\FilterVarTester::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(FilterVarTester::class, $this->tester);
    }

    /**
     * testSetGetFilterVar
     * @covers \pvc\validator\filter_var\FilterVarTester::setFilterVar
     * @covers \pvc\validator\filter_var\FilterVarTester::getFilterVar
     */
    public function testSetGetFilterVar(): void
    {
        $testLabel = 'foo';
        $filterVar = $this->createMock(FilterVarValidate::class);
        /**
         * getLabel is called the first time when the filter var is set, because the setter also adds a message
         * parameter and in doing so, it calls getLabel.
         */
        $filterVar->expects($this->exactly(2))->method('getLabel')->willReturn($testLabel);
        $this->tester->setFilterVar($filterVar);
        self::assertEquals($filterVar, $this->tester->getFilterVar());
        /**
         * and then here is the second call to getlabel
         */
        self::assertEquals($testLabel, $this->tester->getLabel());
    }

    /**
     * testSetFilter
     * @covers \pvc\validator\filter_var\FilterVarTester::setFilter()
     * @covers \pvc\validator\filter_var\FilterVarTester::getFilter()
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
     * @covers \pvc\validator\filter_var\FilterVarTester::setLabel
     */
    public function testSetLabelThrowsExceptionWithEmptyLabel(): void
    {
        self::expectException(InvalidLabelException::class);
        $this->tester->setLabel('');
    }

    /**
     * testSetGetLabel
     * @covers \pvc\validator\filter_var\FilterVarTester::setLabel
     * @covers \pvc\validator\filter_var\FilterVarTester::getLabel
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
     * @covers \pvc\validator\filter_var\FilterVarTester::addOption
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
     * @covers \pvc\validator\filter_var\FilterVarTester::addFlag
     */
    public function testAddFlag(): void
    {
        $flag = FILTER_FLAG_EMAIL_UNICODE;
        $this->filterVar->expects($this->once())->method('addFlag')->with($flag);
        $this->tester->addFlag($flag);
    }

    /**
     * testValidateSucceeds
     * @covers \pvc\validator\filter_var\FilterVarTester::testValue
     */
    public function testValidateSucceeds(): void
    {
        $testValueThatSucceeds = 'foo';
        $this->filterVar->method('validate')->with($testValueThatSucceeds)->willReturn(true);
        self::assertTrue($this->tester->testValue($testValueThatSucceeds));
    }

    /**
     * testValidateFails
     * @covers \pvc\validator\filter_var\FilterVarTester::testValue
     */
    public function testValidateFails(): void
    {
        $testValueThatFails = 'foo';
        $this->filterVar->method('validate')->with($testValueThatFails)->willReturn(false);
        self::assertFalse($this->tester->testValue($testValueThatFails));
    }
}
