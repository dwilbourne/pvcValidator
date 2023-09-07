<?php
/**
 * @package: pvc
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @version: 1.0
 */

namespace pvcTests\validator\min_max;

use pvc\validator\min_max\MinMaxFloatTester;
use pvcTests\validator\ValTesterMaster;

class MinMaxFloatTesterTest extends ValTesterMaster
{

    public function setUp(): void
    {
        $min = 1.1;
        $max = 5.76;
        $this->tester = new MinMaxFloatTester($min, $max);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\min_max\MinMaxFloatTester::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(MinMaxFloatTester::class, $this->tester);
    }
}
