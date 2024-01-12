<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvcTests\validator\min_max;

use pvc\validator\min_max\MinMaxTester;

/**
 * Class MsgIdAndLabelTest
 */
trait MsgIdAndLabelTestMethods
{
    protected MinMaxTester $tester;

    /**
     * testGetMsgId
     */
    public function testGetMsgId(): void
    {
        $messages = include(__DIR__ . '\..\..\src\messages\ValidatorMessages.en.php');
        $msgId = $this->tester->getMsgId();
        self::assertIsString($msgId);
        self::assertTrue(array_key_exists($msgId, $messages));
    }

    /**
     * testGetLabel
     */
    public function testGetLabel(): void
    {
        self::assertIsString($this->tester->getLabel());
        self::assertNotEmpty($this->tester->getLabel());
    }
}
