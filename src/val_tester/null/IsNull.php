<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\null;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class CanBeNull
 * @implements ValTesterInterface<mixed>
 */
class IsNull implements ValTesterInterface
{
    public function testValue(mixed $value): bool
    {
        return is_null($value);
    }
}
