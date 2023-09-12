<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator;

use PHPUnit\Framework\TestCase;
use pvc\interfaces\validator\ValTesterInterface;

class ValTesterMaster extends TestCase
{
    protected ValTesterInterface $tester;

    /**
     * testGetMsgId
     * @covers \pvc\validator\ctype\ValTesterAscii::getMsgId
     * @covers \pvc\validator\dflt\ValTesterAlwaysTrue::getMsgId
     * @covers \pvc\validator\filter_var\FilterVarTester::getMsgId
     * @covers \pvc\validator\min_max\MinMaxDateTester::getMsgId
     * @covers \pvc\validator\min_max\MinMaxFloatTester::getMsgId
     * @covers \pvc\validator\min_max\MinMaxIntegerTester::getMsgId
     * @covers \pvc\validator\min_max\MinMaxTester::getMsgId
     * @covers \pvc\validator\regex\RegexTester::getMsgId
     */
    public function testGetMsgId(): void
    {
        self::assertIsString($this->tester->getMsgId());
    }

    /**
     * testGetMsgParameters
     * @covers \pvc\validator\ctype\ValTesterAscii::getMsgParameters
     * @covers \pvc\validator\dflt\ValTesterAlwaysTrue::getMsgParameters
     * @covers \pvc\validator\filter_var\FilterVarTester::getMsgParameters
     * @covers \pvc\validator\min_max\MinMaxDateTester::getMsgParameters
     * @covers \pvc\validator\min_max\MinMaxFloatTester::getMsgParameters
     * @covers \pvc\validator\min_max\MinMaxIntegerTester::getMsgParameters
     * @covers \pvc\validator\regex\RegexTester::getMsgParameters
     */
    public function testGetMsgParameters(): void
    {
        self::assertIsArray($this->tester->getMsgParameters());
    }
}
