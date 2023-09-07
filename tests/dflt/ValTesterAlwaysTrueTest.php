<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

declare(strict_types=1);

namespace pvcTests\validator\dflt;

use pvc\validator\dflt\ValTesterAlwaysTrue;
use pvcTests\validator\ValTesterMaster;

/**
 * Class ValidatorAlwaysTrueTest
 */
class ValTesterAlwaysTrueTest extends ValTesterMaster
{
    public function setUp(): void
    {
        $this->tester = new ValTesterAlwaysTrue();
    }

    /**
     * testValidate
     * @covers \pvc\validator\dflt\ValTesterAlwaysTrue::testValue
     */
    public function testValidate(): void
    {
        self::assertTrue($this->tester->testValue('anything'));
        self::assertTrue($this->tester->testValue('5'));
        self::assertTrue($this->tester->testValue(null));
    }
}
