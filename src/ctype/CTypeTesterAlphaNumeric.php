<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\ctype;

/**
 * Class ValidatorAlNum
 *
 * Note that ctype_alnum is locale-aware (based on the current locale)
 */
class CTypeTesterAlphaNumeric extends CTypeTester
{
    public function __construct()
    {
        $this->setMsgId('not_alnum');
        $this->setLabel('alphanumeric');
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
