<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

declare(strict_types=1);

namespace pvcTests\validator\val_tester\always_true;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\always_true\ValTesterAlwaysTrue;

/**
 * Class ValidatorAlwaysTrueTest
 */
class ValTesterAlwaysTrueTest extends TestCase
{
    protected \pvc\validator\val_tester\always_true\ValTesterAlwaysTrue $tester;

    public function setUp(): void
    {
        $this->tester = new \pvc\validator\val_tester\always_true\ValTesterAlwaysTrue();
    }

    /**
     * testValidate
     * @covers \pvc\validator\val_tester\always_true\ValTesterAlwaysTrue::testValue
     */
    public function testValidate(): void
    {
        self::assertTrue($this->tester->testValue('anything'));
        self::assertTrue($this->tester->testValue('5'));
        self::assertTrue($this->tester->testValue(null));
    }
}
