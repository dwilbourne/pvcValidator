<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\bool;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class BoolTester
 * @implements ValTesterInterface<bool>
 */
class BoolTester implements ValTesterInterface
{

    public function testValue(mixed $value): bool
    {
        return is_bool($value);
    }
}