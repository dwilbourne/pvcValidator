<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvcTests\validator\min_max;

use PHPUnit\Framework\TestCase;
use pvc\validator\min_max\MinMaxDateTester;

/**
 * Class MinMaxDateTesterTest
 * @covers \pvc\validator\min_max\MinMaxDateTester
 */
class MinMaxDateTesterTest extends TestCase
{
    use MsgIdAndLabelTestMethods;
    public function setUp(): void
    {
        $this->tester = new MinMaxDateTester();
    }
}