<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\messages;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\validator\messages\ValidatorMsg;
use pvc\validator\messages\ValidatorMsgTrait;

class ValidatorMsgTraitTest extends TestCase
{
    protected MockObject $mock;

    public function setUp(): void
    {
        $this->mock = $this->getMockForTrait(ValidatorMsgTrait::class);
    }

    /**
     * testSetGetMsg
     * @covers pvc\validator\messages\ValidatorMsgTrait::getMsg
     * @covers pvc\validator\messages\ValidatorMsgTrait::setMsg
     */
    public function testSetGetMsg(): void
    {
        $mockMsg = $this->createMock(ValidatorMsg::class);
        $this->mock->setMsg($mockMsg);
        self::assertEquals($mockMsg, $this->mock->getMsg());
    }
}
