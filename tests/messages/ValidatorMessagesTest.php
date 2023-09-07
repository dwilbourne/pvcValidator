<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\messages;

use PHPUnit\Framework\TestCase;

class ValidatorMessagesTest extends TestCase
{
    /**
     * testMessages
     * @covers pvc\validator\messages\ValidatorMessages.en.php
     */
    public function testMessages(): void
    {
        $messages = include(__DIR__ . '\..\..\src\messages\ValidatorMessages.en.php');
        self::assertIsArray($messages);
    }
}
