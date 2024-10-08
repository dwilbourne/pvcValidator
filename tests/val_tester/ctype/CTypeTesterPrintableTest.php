<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\val_tester\ctype;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\ctype\CTypeTesterPrintable;

class CTypeTesterPrintableTest extends TestCase
{
    protected CTypeTesterPrintable $tester;

    public function setUp(): void
    {
        $this->tester = new CTypeTesterPrintable();
    }

    /**
     * testConstruct
     * @covers \pvc\validator\val_tester\ctype\CTypeTesterPrintable::__construct
     */
    public function testConstruct(): void
    {
        self::assertEquals('ctype_print', $this->tester->getCallable());
    }

    /**
     * @dataProvider dataProvider
     * @param string $string
     * @param bool $expectedResult
     * @covers \pvc\validator\val_tester\ctype\CTypeTesterPrintable::testValue
     */
    public function testValidatorSuccess(string $string, bool $expectedResult): void
    {
        self::assertEquals($expectedResult, $this->tester->testValue($string));
    }

    public function dataProvider(): array
    {
        return [
            /** backslashes for control characters only works if you use double quotes */
            'string1' => ["asdf\n\r\t", false, 'incorrectly validated string with control chartacters'],
            'string2' => ["arf12", true, 'failed to validate a purely alphanumeric'],
            'string3' => ["LKA#@%.54", true, 'failed to validate a string with alphanumerics and special characters'],
        ];
    }

}
