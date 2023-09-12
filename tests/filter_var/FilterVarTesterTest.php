<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\validator\filter_var;

use pvc\validator\filter_var\FilterVarTester;
use pvcTests\validator\ValTesterMaster;

/**
 * Class FilterVarTesterTest
 */
class FilterVarTesterTest extends ValTesterMaster
{
    public function setUp(): void
    {
        $this->tester = $this->getMockBuilder(FilterVarTester::class)
                             ->disableOriginalConstructor()
                             ->getMockForAbstractClass();
    }

    /**
     * testSetGetFilter
     * @covers \pvc\validator\filter_var\FilterVarTester::setFilter
     * @covers \pvc\validator\filter_var\FilterVarTester::getFilter
     */
    public function testSetGetFilter(): void
    {
        $testFilter = FILTER_VALIDATE_URL;
        $this->tester->setFilter($testFilter);
        self::assertEquals($testFilter, $this->tester->getFilter());
    }

    /**
     * testSetGetOptionsArray
     * @covers \pvc\validator\filter_var\FilterVarTester::getOptionsArray
     */
    public function testSetGetOptionsArray(): void
    {
        $array = $this->tester->getOptionsArray();
        self::assertTrue(isset($array['options']));
        self::assertTrue(isset($array['flags']));
    }

    /**
     * testAddOption
     * @covers \pvc\validator\filter_var\FilterVarTester::addOption
     */
    public function testAddOption(): void
    {
        $option = 'default';
        $value = 3;
        $this->tester->addOption($option, $value);
        $optionsArray = $this->tester->getOptionsArray();
        self::assertTrue(isset($optionsArray['options']['default']));
        self::assertEquals($value, $optionsArray['options']['default']);
    }

    /**
     * testAddFlag
     * @covers \pvc\validator\filter_var\FilterVarTester::addFlag
     */
    public function testAddFlag(): void
    {
        $flag = FILTER_FLAG_EMAIL_UNICODE;
        $this->tester->addFlag($flag);
        $optionsArray = $this->tester->getOptionsArray();
        $flags = $optionsArray['flags'];
        self::assertTrue(in_array($flag, $flags));
    }

    /**
     * testValidateSucceeds
     * @covers \pvc\validator\filter_var\FilterVarTester::testValue
     */
    public function testValidateSucceeds(): void
    {
        $testFilter = FILTER_VALIDATE_URL;
        $this->tester = $this->getMockForAbstractClass(FilterVarTester::class);
        $this->tester->setFilter($testFilter);
        $goodUrlString = 'http://www.somehost.com/support';
        self::assertTrue($this->tester->testValue($goodUrlString));
    }

    /**
     * testValidateFails
     * @covers \pvc\validator\filter_var\FilterVarTester::testValue
     *
     */
    public function testValidateFails(): void
    {
        $testFilter = FILTER_VALIDATE_URL;
        $this->tester = $this->getMockForAbstractClass(FilterVarTester::class);
        $this->tester->setFilter($testFilter);
        $badUrlString = 'notUrl';
        self::assertFalse($this->tester->testValue($badUrlString));
    }
}
