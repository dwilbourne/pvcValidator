<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\factory;

use pvc\interfaces\regex\RegexFactoryInterface;
use pvc\validator\filter_var\FilterVarTester;
use pvc\validator\regex\RegexTester;
use pvc\validator\ValTester;

/**
 * Class AbstractTesterFactory
 * @template DataType
 */
class AbstractTesterFactory
{
    /**
     * @var RegexFactoryInterface
     */
    protected RegexFactoryInterface $regexFactory;

    /**
     * @param RegexFactoryInterface $regexFactory
     */
    public function __construct(RegexFactoryInterface $regexFactory)
    {
        $this->regexFactory = $regexFactory;
    }

    /**
     * makeFilterVarTester
     * @return FilterVarTester
     */
    public function makeFilterVarTester(): FilterVarTester
    {
        return new FilterVarTester();
    }

    /**
     * makeRegexTester
     * @return RegexTester
     */
    public function makeRegexTester(): RegexTester
    {
        $tester = new RegexTester();
        $tester->setRegex($this->regexFactory->makeRegex());
        return $tester;
    }

    /**
     * makeValTester
     * @return ValTester<DataType>
     */
    public function makeValTester(): ValTester
    {
        return new ValTester();
    }
}
