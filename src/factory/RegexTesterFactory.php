<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\factory;

use pvc\interfaces\regex\RegexFactoryInterface;
use pvc\validator\regex\RegexTester;

/**
 * Class RegexTesterFactory
 */
class RegexTesterFactory
{
    protected RegexFactoryInterface $regexFactory;

    public function __construct(RegexFactoryInterface $regexFactory)
    {
        $this->regexFactory = $regexFactory;
    }

    public function makeRegexTester(): RegexTester
    {
        $tester = new RegexTester();
        $tester->setRegex($this->regexFactory->makeRegex());
        return $tester;
    }
}
