<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\ctype;

use pvc\interfaces\validator\valtesters\ValTesterCallableInterface;
use pvc\validator\val_tester\callable\CallableTester;

/**
 * Class CTypeTesterDigit
 * @extends CallableTester<string>
 */
class CTypeTesterDigit extends CallableTester implements ValTesterCallableInterface
{
    public function __construct()
    {
        $this->setCallable('ctype_digit');
    }
}