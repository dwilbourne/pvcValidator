<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

declare(strict_types=1);

namespace pvcTests\validator\always_true;

use PHPUnit\Framework\TestCase;
use pvc\validator\always_true\ValTesterAlwaysTrue;

/**
 * Class ValidatorAlwaysTrueTest
 */
class ValTesterAlwaysTrueTest extends TestCase
{
    protected ValTesterAlwaysTrue $tester;

    public function setUp(): void
    {
        $this->tester = new ValTesterAlwaysTrue();
    }

    /**
     * testConstructorSetsMsgId
     * @covers \pvc\validator\always_true\ValTesterAlwaysTrue::__construct
     */
    public function testConstructorSetsMsgId(): void
    {
        self::assertInstanceOf(ValTesterAlwaysTrue::class, $this->tester);
        self::assertNotEmpty($this->tester->getMsgId());
    }

    /**
     * testValidate
     * @covers \pvc\validator\always_true\ValTesterAlwaysTrue::testValue
     */
    public function testValidate(): void
    {
        self::assertTrue($this->tester->testValue('anything'));
        self::assertTrue($this->tester->testValue('5'));
        self::assertTrue($this->tester->testValue(null));
    }
}
