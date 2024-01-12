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
    public function setUp(): void
    {
        $this->tester = new ValTesterAlwaysTrue();
    }

    /**
     * testGetMsgId
     * @covers \pvc\validator\always_true\ValTesterAlwaysTrue::getMsgId
     */
    public function testGetMsgId(): void
    {
        $expectedResult = '';
        self::assertEquals($expectedResult, $this->tester->getMsgId());
    }

    /**
     * testGetLabel
     * @covers \pvc\validator\always_true\ValTesterAlwaysTrue::getLabel
     */
    public function testGetLabel(): void
    {
        self::assertIsString($this->tester->getLabel());
        self::assertNotEmpty($this->tester->getLabel());
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
