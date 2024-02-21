<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\ctype;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class ValidatorAlNum
 * @implements ValTesterInterface<string>
 *
 * Note that ctype_alnum is locale-aware (based on the current locale)
 */
class CTypeTesterAlphaNumeric extends CTypeTester
{
    /**
     * testValue
     * @param mixed $value
     * @return bool
     */
    public function testValue(mixed $value): bool
    {
        return ctype_alnum($value);
    }
}
