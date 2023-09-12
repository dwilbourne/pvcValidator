<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\min_max;

use DateTime;
use pvc\validator\min_max\MinMaxDateTester;
use pvcTests\validator\ValTesterMaster;

class MinMaxDateTesterTest extends ValTesterMaster
{
    public function setUp(): void
    {
        $min = new DateTime('2022-01-01');
        $max = new DateTime('2022-12-31');
        $this->tester = new MinMaxDateTester();
        $this->tester->setMinMax($min, $max);
    }
}
