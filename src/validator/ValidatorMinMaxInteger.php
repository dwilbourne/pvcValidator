<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\validator;

use pvc\interfaces\msg\MsgInterface;
use pvc\validator\val_tester\min_max\MinMaxIntegerTester;
use pvc\validator\Validator;

/**
 * Class ValidatorMinMaxInteger
 * @extends Validator<integer>
 */
class ValidatorMinMaxInteger extends Validator
{
    /**
     * @var MinMaxIntegerTester
     */
    protected MinMaxIntegerTester $valTester;

    /**
     * @param MsgInterface $msg
     * @param MinMaxIntegerTester $valTester
     */
    public function __construct(MsgInterface $msg, MinMaxIntegerTester $valTester)
    {
        parent::__construct($msg);
        $this->setValTester($valTester);
    }

    /**
     * getValTester
     * @return MinMaxIntegerTester
     */
    public function getValTester(): MinMaxIntegerTester
    {
        return $this->valTester;
    }

    /**
     * setValTester
     * @param MinMaxIntegerTester $valTester
     */
    public function setValTester(MinMaxIntegerTester $valTester): void
    {
        $this->valTester = $valTester;
    }

    /**
     * setMsgContent
     */
    protected function setMsgContent(): void
    {
        $msgId = 'invalid_min_max_integer';
        $msgParameters = ['min' => $this->valTester->getMin(), 'max' => $this->valTester->getMax()];
        $domain = 'Validator';
        $this->getMsg()->setContent($domain, $msgId, $msgParameters);
    }

    /**
     * testValue
     * @param integer $data
     * @return bool
     */
    protected function testValue(mixed $data): bool
    {
        return $this->valTester->testValue($data);
    }
}
