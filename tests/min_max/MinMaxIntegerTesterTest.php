<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\validator\min_max;

use pvc\validator\min_max\MinMaxIntegerTester;
use pvcTests\validator\ValTesterMaster;

class MinMaxIntegerTesterTest extends ValTesterMaster
{
    public function setUp(): void
    {
        $min = 0;
        $max = 5;
        $this->tester = new MinMaxIntegerTester();
        $this->tester->setMinMax($min, $max);
    }
}
