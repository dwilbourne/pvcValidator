<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\ctype;

use pvc\validator\val_tester\callable\CallableTester;

/**
 * Class CTypeTesterPrintable
 * @extends CallableTester
 */
class CTypeTesterPrintable extends CallableTester
{
    public function __construct()
    {
        $this->setCallable('ctype_print');
    }
}
