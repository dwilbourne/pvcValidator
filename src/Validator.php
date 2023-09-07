<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator;

use pvc\interfaces\validator\ValidatorInterface;
use pvc\interfaces\validator\ValTesterInterface;
use pvc\validator\messages\ValidatorMsg;

/**
 * Class ValidatorAbstract
 * @template DataType
 * @implements ValidatorInterface<DataType>
 */
abstract class Validator implements ValidatorInterface
{
    /**
     * @var ValidatorMsg
     */
    protected ValidatorMsg $msg;

    /**
     * @var ValTesterInterface<DataType>
     */
    protected ValTesterInterface $valTester;

    /**
     * @var bool
     */
    protected bool $required;

    /**
     * @param ValidatorMsg $msg
     * @param ValTesterInterface<DataType> $valTester
     */
    public function __construct(ValidatorMsg $msg, ValTesterInterface $valTester)
    {
        $this->setMsg($msg);
        $this->setValTester($valTester);
        $this->required = true;
    }

    /**
     * getValTester
     * @return ValTesterInterface<DataType>
     */
    public function getValTester(): ValTesterInterface
    {
        return $this->valTester;
    }

    /**
     * setValTester
     * @param ValTesterInterface<DataType> $valTester
     */
    public function setValTester(ValTesterInterface $valTester): void
    {
        $this->valTester = $valTester;
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
            $this->getMsg()->setContent('not_null');
            return false;
        }

        /**
         * test the value
         */
        if (!$this->valTester->testValue($data)) {
            $this->getMsg()->setContent($this->valTester->getMsgId(), $this->valTester->getMsgParameters());
            return false;
        }
        return true;
    }

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
}
