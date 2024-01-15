<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\ctype;

use pvc\validator\ValTester;

/**
 * Class CTypeTesterPrintable
 */
class CTypeTesterPrintable extends ValTester
{
    /**
     * @throws \pvc\validator\err\InvalidLabelException
     */
    public function __construct()
    {
        $this->setMsgId('not_printable');
    }

    /**
     * testValue
     * @param mixed $value
     * @return bool
     */
    public function testValue(mixed $value): bool
    {
        return ctype_print($value);
    }
}