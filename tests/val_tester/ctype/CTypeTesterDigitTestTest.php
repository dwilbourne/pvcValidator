<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\val_tester\ctype;

use PHPUnit\Framework\TestCase;
use pvc\validator\val_tester\ctype\CTypeTesterDigit;

class CTypeTesterDigitTestTest extends TestCase
{
    protected CTypeTesterDigit $tester;

    public function setUp(): void
    {
        $this->tester = new CTypeTesterDigit();
    }

    /**
     * testConstruct
     * @covers \pvc\validator\val_tester\ctype\CTypeTesterDigit::__construct
     */
    public function testConstruct(): void
    {
        self::assertEquals('ctype_digit', $this->tester->getCallable());
    }
}
