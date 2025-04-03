<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\bool;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class BoolTester
 * @implements ValTesterInterface<mixed>
 */
class BoolTester implements ValTesterInterface
{
    /**
     * @param mixed|null $value
     * @return bool
     */
    public function testValue($value): bool
    {
        return is_bool($value);
    }
}