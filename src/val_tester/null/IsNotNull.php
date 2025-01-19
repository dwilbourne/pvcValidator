<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\null;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class IsNotNull
 */
class IsNotNull implements ValTesterInterface
{

    public function testValue(mixed $value): bool
    {
        return !is_null($value);
    }
}
