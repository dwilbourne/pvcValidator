<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\ctype;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class CTypeTesterPrintable
 * @implements ValTesterInterface<string>
 */
class CTypeTesterPrintable implements ValTesterInterface
{
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
