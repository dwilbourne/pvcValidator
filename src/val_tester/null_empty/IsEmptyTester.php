<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\null_empty;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class CanBeNull
 *
 * @implements ValTesterInterface<mixed>
 */
class IsEmptyTester implements ValTesterInterface
{
    public function testValue(mixed $value): bool
    {
        return empty($value);
    }
}
