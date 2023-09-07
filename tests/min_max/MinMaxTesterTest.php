<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare (strict_types=1);

namespace pvcTests\validator\min_max;

use pvc\validator\err\SetMaxException;
use pvc\validator\err\SetMinException;
use pvc\validator\min_max\MinMaxTester;
use pvcTests\validator\ValTesterMaster;

class MinMaxTesterTest extends ValTesterMaster
{
    public function setUp(): void
    {
        $this->tester = $this->getMockBuilder(MinMaxTester::class)
                             ->disableOriginalConstructor()
                             ->getMockForAbstractClass();
    }

    /**
     * testSetMinWithNull
     * @throws \pvc\validator\err\SetMinException
     * @covers \pvc\validator\min_max\MinMaxTester::setMin
     */
    public function testSetMinWithNull(): void
    {
        self::expectException(SetMinException::class);
        $this->tester->setMin(null);
    }

    /**
     * testSetMaxWithNull
     * @throws \pvc\validator\err\SetMaxException
     * @covers \pvc\validator\min_max\MinMaxTester::setMax
     */
    public function testSetMaxWithNull(): void
    {
        self::expectException(SetMaxException::class);
        $this->tester->setMax(null);
    }

    /**
     * testSetMinGreaterThanMaxThrowsException
     * @throws SetMinException
     * @covers \pvc\validator\min_max\MinMaxTester::setMin
     */
    public function testSetMinGreaterThanMaxThrowsException(): void
    {
        $this->tester->setMax(5);
        self::expectException(SetMinException::class);
        $this->tester->setMin(10);
    }

    /**
     * testSetMaxLessThanMinThrowsException
     * @throws SetMaxException
     * @covers \pvc\validator\min_max\MinMaxTester::setMax
     */
    public function testSetMaxLessThanMinThrowsException(): void
    {
        $this->tester->setMin(5);
        self::expectException(SetMaxException::class);
        $this->tester->setMax(2);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\min_max\MinMaxTester::__construct
     * @covers \pvc\validator\min_max\MinMaxTester::setMin
     * @covers \pvc\validator\min_max\MinMaxTester::getMin
     * @covers \pvc\validator\min_max\MinMaxTester::setMax
     * @covers \pvc\validator\min_max\MinMaxTester::getMax
     *
     */
    public function testConstruct(): void
    {
        $min = 0;
        $max = 5;
        $this->tester = $this->getMockBuilder(MinMaxTester::class)
                             ->setConstructorArgs([$min, $max])
                             ->getMockForAbstractClass();
        self::assertEquals($min, $this->tester->getMin());
        self::assertEquals($max, $this->tester->getMax());
    }

    /**
     * testFailsWhenDataIsLessThanMin
     * @covers \pvc\validator\min_max\MinMaxTester::testValue
     */
    public function testFailsWhenDataIsLessThanMin(): void
    {
        $min = 6;
        $max = 10;
        $data = 4;
        $this->tester = $this->getMockBuilder(MinMaxTester::class)
                             ->setConstructorArgs([$min, $max])
                             ->getMockForAbstractClass();
        self::assertFalse($this->tester->testValue($data));
    }

    /**
     * testValidateFailsWhenDataIsGreaterThanMax
     * @covers \pvc\validator\min_max\MinMaxTester::testValue
     */
    public function testValidateFailsWhenDataIsGreaterThanMax(): void
    {
        $min = 6;
        $max = 10;
        $data = 15;
        $this->tester = $this->getMockBuilder(MinMaxTester::class)
                             ->setConstructorArgs([$min, $max])
                             ->getMockForAbstractClass();
        self::assertFalse($this->tester->testValue($data));
    }

    /**
     * testValidateSucceeds
     * @covers \pvc\validator\min_max\MinMaxTester::testValue
     */
    public function testValidateSucceeds(): void
    {
        $min = 6;
        $max = 10;
        $data = 8;
        $this->tester = $this->getMockBuilder(MinMaxTester::class)
                             ->setConstructorArgs([$min, $max])
                             ->getMockForAbstractClass();
        self::assertTrue($this->tester->testValue($data));
    }
}
