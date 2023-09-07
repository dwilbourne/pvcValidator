<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\ctype;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class ValidatorAlNum
 * @implements ValTesterInterface<string>
 */
class ValTesterAscii implements ValTesterInterface
{
    /**
     * getMsgId
     * @return string
     */
    public function getMsgId(): string
    {
        return 'not_alnum';
    }

    /**
     * getMsgParameters
     * @return array|mixed[]
     */
    public function getMsgParameters(): array
    {
        return [];
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
