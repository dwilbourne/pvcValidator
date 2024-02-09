<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator;

use pvc\interfaces\msg\MsgInterface;
use pvc\interfaces\validator\ValidatorInterface;

/**
 * Class ValidatorAbstract
 * @template DataType
 * @implements ValidatorInterface<DataType>
 */
abstract class Validator implements ValidatorInterface
{
    /**
     * @var MsgInterface
     */
    protected MsgInterface $msg;

    /**
     * @var bool
     */
    protected bool $required = true;

    /**
     * @param MsgInterface $msg
     */
    public function __construct(MsgInterface $msg)
    {
        $this->setMsg($msg);
    }

    /**
     * validate
     * @param DataType $data
     * @return bool
     */
    public function validate($data = null): bool
    {
        /**
         * initialize message each time, so it is correct if validate is called multiple times in succession
         */
        $this->getMsg()->clearContent();

        /**
         * return true if data is not required and null was passed
         */
        if (!$this->isRequired() && is_null($data)) {
            return true;
        }

        /**
         * return false if date is required and data is null.  Empty is not good enough (e.g. anything that evaluates
         * to false) - must explicitly be null.
         */
        if ($this->isRequired() && is_null($data)) {
            $msgId = 'not_null';
            $parameters = [];
            $domain = 'Validator';
            $this->getMsg()->setContent($domain, $msgId, $parameters);
            return false;
        }

        /**
         * test the value
         */
        if (!$this->testValue($data)) {
            $this->setMsgContent();
            return false;
        }
        return true;
    }

    /**
     * getMsg
     * @return MsgInterface
     */
    public function getMsg(): MsgInterface
    {
        return $this->msg;
    }

    /**
     * setMsg
     * @param MsgInterface $msg
     */
    public function setMsg(MsgInterface $msg): void
    {
        $this->msg = $msg;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @param bool $required
     */
    public function setRequired(bool $required): void
    {
        $this->required = $required;
    }

    /**
     * setMsgContent
     */
    abstract protected function setMsgContent(): void;

    /**
     * testValue
     * @param $data<DataType>
     * @return bool
     */
    abstract protected function testValue(mixed $data): bool;
}
