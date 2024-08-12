<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

declare(strict_types=1);

namespace pvcTests\validator\val_tester\always_true;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\always_true\AlwaysTrueTester;

/**
 * Class ValidatorAlwaysTrueTest
 */
class AlwaysTrueValTesterTest extends TestCase
{
    protected AlwaysTrueTester $tester;

    public function setUp(): void
    {
        $this->tester = new AlwaysTrueTester();
    }

    /**
     * testValidate
     * @covers \pvc\validator\val_tester\always_true\AlwaysTruetester::testValue
     */
    public function testValidate(): void
    {
        self::assertTrue($this->tester->testValue('anything'));
        self::assertTrue($this->tester->testValue('5'));
        self::assertTrue($this->tester->testValue(null));
    }
}
