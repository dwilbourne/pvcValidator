<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\messages;

use pvc\msg\Msg;

/**
 * Class ValidatorMsg
 */
class ValidatorMsg extends Msg
{
    public function __construct(string $domain = 'ValidatorMessages')
    {
        $this->setDomain($domain);
    }
}
