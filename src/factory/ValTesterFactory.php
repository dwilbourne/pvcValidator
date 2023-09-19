<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\factory;

use pvc\interfaces\validator\ValTesterInterface;
use pvc\validator\ValTester;

/**
 * Class ValTesterFactory
 */
class ValTesterFactory
{
    public function makeValTester(): ValTesterInterface
    {
        return new ValTester();
    }
}
