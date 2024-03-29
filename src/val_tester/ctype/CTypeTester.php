<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\ctype;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class CTypeTester
 * @implements ValTesterInterface<string>
 */
abstract class CTypeTester implements ValTesterInterface
{
    /**
     * testValue
     * @param mixed $value
     * @return bool
     */
    abstract public function testValue(mixed $value): bool;
}
