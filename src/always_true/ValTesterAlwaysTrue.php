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

    public function __construct()
    {
        /**
         * this class has no message
         */
        $this->setMsgId('null_msg');
    }
    public function testValue(mixed $value): bool
    {
        return true;
    }
}
