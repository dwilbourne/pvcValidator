<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\val_tester\bool;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\bool\BoolTester;

class BoolTesterTest extends TestCase
{
    protected BoolTester $tester;

    public function setUp(): void
    {
        $this->tester = new BoolTester();
    }

    /**
     * testBoolTester
     * @param bool $expectedValue
     * @param mixed $input
     * @param string $msg
     * @covers       \pvc\validator\val_tester\bool\BoolTester::testValue
     * @dataProvider dataProvider
     */
    public function testBoolTester(bool $expectedValue, mixed $input, string $msg): void
    {
        self::assertEquals($expectedValue, $this->tester->testValue($input), $msg);
    }

    public function dataProvider(): array
    {
        return [
            'true' => [true, true, 'failed to validate true'],
            'false' => [true, false, 'failed to validate false'],
            '9' => [false, 9, 'incorrectly validated 9'],
            'test' => [false, 'test', 'incorrectly validated test'],
        ];
    }
}
