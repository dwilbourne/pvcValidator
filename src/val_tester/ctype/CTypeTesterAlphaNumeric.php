<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\ctype;

use pvc\validator\val_tester\callable\CallableTester;

/**
 * Class CTypeTesterAlphaNumeric
 * @extends CallableTester<string>
 *
 * Note that ctype_alnum is locale-aware (based on the current locale)
 */
class CTypeTesterAlphaNumeric extends CallableTester
{
    public function __construct()
    {
        parent::__construct('ctype_alnum');
    }
}
