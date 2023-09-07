<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\min_max;

use DateTime;

/**
 * Class MinMaxDateTester
 * @extends MinMaxTester<DateTime>
 */
class MinMaxDateTester extends MinMaxTester
{
    /**
     * getMsgId
     * @return string
     */
    public function getMsgId(): string
    {
        return 'invalid_min_max_date';
    }
}
