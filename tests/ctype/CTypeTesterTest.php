<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\ctype;


use PHPUnit\Framework\TestCase;
use pvc\validator\ctype\CTypeTester;
use pvc\validator\err\InvalidLabelException;

class CTypeTesterTest extends TestCase
{
    protected CTypeTester $tester;

    public function setUp(): void
    {
        $this->tester = $this->getMockForAbstractClass(CTypeTester::class);
    }

    /**
     * testSetLabelThrowsExceptionWithEmptyLabel
     * @throws InvalidLabelException
     * @covers \pvc\validator\ctype\CTypeTester::setLabel
     */
    public function testSetLabelThrowsExceptionWithEmptyLabel(): void
    {
        self::expectException(InvalidLabelException::class);
        $this->tester->setLabel('');
    }

    /**
     * testSetGetLabel
     * @throws InvalidLabelException
     * @covers \pvc\validator\ctype\CTypeTester::setLabel
     * @covers \pvc\validator\ctype\CTypeTester::getLabel
     */
    public function testSetGetLabel(): void
    {
        $label = 'foo';
        $this->tester->setLabel($label);
        self::assertEquals($label, $this->tester->getLabel());
    }
}
