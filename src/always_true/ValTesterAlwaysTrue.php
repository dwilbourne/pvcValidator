<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version 1.0
 */

declare(strict_types=1);

namespace pvc\validator\always_true;

use pvc\validator\ValTester;

/**
 * Class ValTesterAlwaysTrue
 * @extends ValTester<mixed>
 */
class ValTesterAlwaysTrue extends ValTester
{
    public function testValue(mixed $value): bool
    {
        return true;
    }

    public function getLabel(): string
    {
        return 'always true';
    }

    public function getMsgId(): string
    {
        /**
         * msgId can be empty because this class has no messages
         */
        return '';
    }
}
