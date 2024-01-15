<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\ctype;

use pvc\validator\ValTester;

/**
 * Class ValidatorAlNum
 *
 * Note that ctype_alnum is locale-aware (based on the current locale)
 */
class CTypeTesterAlphaNumeric extends ValTester
{
    public function __construct()
    {
        $this->setMsgId('not_alnum');
    }

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
