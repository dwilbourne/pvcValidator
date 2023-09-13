<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvcTests\validator\factory;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use pvc\interfaces\regex\RegexFactoryInterface;
use pvc\validator\factory\RegexTesterFactory;
use pvc\validator\regex\RegexTester;

class RegexTesterFactoryTest extends TestCase
{

    protected RegexFactoryInterface|MockObject $regexFactory;

    public function setUp(): void
    {
        $this->regexFactory = $this->createMock(RegexFactoryInterface::class);
    }

    /**
     * testConstruct
     * @covers \pvc\validator\factory\RegexTesterFactory::__construct
     */
    public function testConstruct()
    {
        $testerFactory = new RegexTesterFactory($this->regexFactory);
        self::assertInstanceOf(RegexTesterFactory::class, $testerFactory);
    }

    /**
     * testMakeRegexTester
     * @covers \pvc\validator\factory\RegexTesterFactory::makeRegexTester
     */
    public function testMakeRegexTester()
    {
        $testerFactory = new RegexTesterFactory($this->regexFactory);
        $tester = $testerFactory->makeRegexTester();
        self::assertInstanceOf(RegexTester::class, $tester);
    }
}
