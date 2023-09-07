<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\messages;

use PHPUnit\Framework\TestCase;
use pvc\validator\messages\ValidatorMsg;

class ValidatorMsgTest extends TestCase
{
    protected ValidatorMsg $validatorMsg;

    public function setUp(): void
    {
        $this->validatorMsg = new ValidatorMsg();
    }

    /**
     * testConstruct
     * @covers \pvc\validator\messages\ValidatorMsg::__construct
     */
    public function testConstruct()
    {
        self::assertIsString($this->validatorMsg->getDomain());
    }
}
