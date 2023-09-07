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
        $fromDate = new DateTime('2023-01-01');
        $toDate = new DateTime('2023-12-31');
        $this->tester = new MinMaxDateTester($fromDate, $toDate);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\min_max\MinMaxDateTester::__construct
     */
    public function testConstruct(): void
    {
        self::assertInstanceOf(MinMaxDateTester::class, $this->tester);
    }
}
