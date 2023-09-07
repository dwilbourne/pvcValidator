<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\min_max;

/**
 * Class ValidatorMinMaxInteger
 * @extends MinMaxTester<integer>
 */
class MinMaxIntegerTester extends MinMaxTester
{
    /**
     * getMsgId
     * @return string
     */
    public function getMsgId(): string
    {
        return 'invalid_min_max_integer';
    }
}
