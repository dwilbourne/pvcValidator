<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\always_true;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class ValTesterAlwaysTrue
 * @implements ValTesterInterface<mixed>
 */
class ValTesterAlwaysTrue implements ValTesterInterface
{
    /**
     * testValue
     * @param mixed $value
     * @return bool
     */
    public function testValue(mixed $value): bool
    {
        return true;
    }
}
