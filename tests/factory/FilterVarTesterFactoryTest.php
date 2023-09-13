<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace factory;

use pvc\validator\factory\FilterVarTesterFactory;
use PHPUnit\Framework\TestCase;
use pvc\validator\filter_var\FilterVarTester;

class FilterVarTesterFactoryTest extends TestCase
{

    /**
     * testMakeFilterVarTester
     * @covers \pvc\validator\factory\FilterVarTesterFactory::makeFilterVarTester
     */
    public function testMakeFilterVarTester()
    {
        $factory = new FilterVarTesterFactory();
        $tester = $factory->makeFilterVarTester();
        self::assertInstanceOf(FilterVarTester::class, $tester);
    }
}
