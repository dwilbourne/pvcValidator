<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\factory;

use pvc\validator\filter_var\FilterVarTester;

/**
 * Class FilterVarTesterFactory
 */
class FilterVarTesterFactory
{
    public function makeFilterVarTester(): FilterVarTester
    {
        return new FilterVarTester();
    }
}