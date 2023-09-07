<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

declare(strict_types=1);

namespace pvc\validator\dflt;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class ValTesterAlwaysTrue
 * @template DataType
 * @implements ValTesterInterface<DataType>
 */
class ValTesterAlwaysTrue implements ValTesterInterface
{
    public function testValue(mixed $value): bool
    {
        return true;
    }

    public function getMsgId(): string
    {
        return '';
    }

    public function getMsgParameters(): array
    {
        return [];
    }
}
