<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\messages;

/**
 * Class ValidatorMsgTrait
 */
trait ValidatorMsgTrait
{
    /**
     * @var ValidatorMsg
     */
    protected ValidatorMsg $msg;

    /**
     * getMsg
     * @return ValidatorMsg
     */
    public function getMsg(): ValidatorMsg
    {
        return $this->msg;
    }

    /**
     * setMsg
     * @param ValidatorMsg $msg
     */
    public function setMsg(ValidatorMsg $msg): void
    {
        $this->msg = $msg;
    }
}
