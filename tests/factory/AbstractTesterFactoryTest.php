<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\factory;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\regex\RegexFactoryInterface;
use pvc\validator\factory\AbstractTesterFactory;
use pvc\validator\filter_var\FilterVarTester;
use pvc\validator\regex\RegexTester;
use pvc\validator\ValTester;

/**
 * Class AbstractTesterFactoryTest
 */
class AbstractTesterFactoryTest extends TestCase
{
    protected AbstractTesterFactory $abstractTesterFactory;

    public function setUp(): void
    {
        $this->abstractTesterFactory = new AbstractTesterFactory();
    }

    /**
     * testMakeRegexTester
     * @covers \pvc\validator\factory\AbstractTesterFactory::makeRegexTester
     */
    public function testMakeRegexTester()
    {
        $tester = $this->abstractTesterFactory->makeRegexTester();
        self::assertInstanceOf(RegexTester::class, $tester);
    }

    /**
     * testMakeFilterVarTester
     * @covers \pvc\validator\factory\AbstractTesterFactory::makeFilterVarTester
     */
    public function testMakeFilterVarTester()
    {
        $tester = $this->abstractTesterFactory->makeFilterVarTester();
        self::assertInstanceOf(FilterVarTester::class, $tester);
    }
}
