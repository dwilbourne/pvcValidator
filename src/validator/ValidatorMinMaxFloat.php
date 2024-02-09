<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\validator;

use pvc\interfaces\msg\MsgInterface;
use pvc\validator\val_tester\min_max\MinMaxFloatTester;
use pvc\validator\Validator;

/**
 * Class ValidatorMinMaxFloat
 * @extends Validator<float>
 */
class ValidatorMinMaxFloat extends Validator
{
    /**
     * @var MinMaxFloatTester
     */
    protected MinMaxFloatTester $valTester;

    /**
     * @param MsgInterface $msg
     * @param MinMaxFloatTester $tester
     */
    public function __construct(MsgInterface $msg, MinMaxFloatTester $tester)
    {
        parent::__construct($msg);
        $this->setValTester($tester);
    }

    /**
     * getValTester
     * @return MinMaxFloatTester
     */
    public function getValTester(): MinMaxFloatTester
    {
        return $this->valTester;
    }

    /**
     * setValTester
     * @param MinMaxFloatTester $valTester
     */
    public function setValTester(MinMaxFloatTester $valTester): void
    {
        $this->valTester = $valTester;
    }

    /**
     * setMsgContent
     */
    protected function setMsgContent(): void
    {
        $msgId = 'invalid_min_max_float';
        $msgParameters = ['min' => $this->valTester->getMin(), 'max' => $this->valTester->getMax()];
        $domain = 'Validator';
        $this->getMsg()->setContent($domain, $msgId, $msgParameters);
    }

    /**
     * testValue
     * @param float $data
     * @return bool
     */
    protected function testValue(mixed $data): bool
    {
        return $this->valTester->testValue($data);
    }
}
