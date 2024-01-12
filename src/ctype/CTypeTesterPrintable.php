<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\ctype;

/**
 * Class CTypeTesterPrintable
 */
class CTypeTesterPrintable extends CTypeTester
{

    /**
     * @throws \pvc\validator\err\InvalidLabelException
     */
    public function __construct()
    {
        $this->setMsgId('not_printable');
        $this->setLabel('printable characters');
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