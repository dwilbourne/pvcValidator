<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\factory;

use pvc\filtervar\FilterVarValidate;
use pvc\regex\Regex;
use pvc\validator\filter_var\FilterVarTester;
use pvc\validator\regex\RegexTester;

/**
 * Class AbstractTesterFactory
 * @template DataType
 */
class AbstractTesterFactory
{

    /**
     * makeFilterVarTester
     * @return FilterVarTester
     */
    public function makeFilterVarTester(): FilterVarTester
    {
        $filterVarValidate = new FilterVarValidate();
        $tester = new FilterVarTester();
        $tester->setFilterVar($filterVarValidate);
        return $tester;
    }

    /**
     * makeRegexTester
     * @return RegexTester
     */
    public function makeRegexTester(): RegexTester
    {
        $regex = new Regex();
        $tester = new RegexTester();
        $tester->setRegex($regex);
        return $tester;
    }
}
