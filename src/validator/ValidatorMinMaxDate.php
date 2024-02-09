<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\validator;

use DateTime;
use pvc\interfaces\msg\MsgInterface;
use pvc\validator\val_tester\min_max\MinMaxDateTester;
use pvc\validator\Validator;

/**
 * Class ValidatorMinMaxDate
 * @extends Validator<DateTime>
 */
class ValidatorMinMaxDate extends Validator
{
    /**
     * @var MinMaxDateTester
     */
    protected MinMaxDateTester $valTester;

    /**
     * @param MsgInterface $msg
     * @param MinMaxDateTester $tester
     */
    public function __construct(MsgInterface $msg, MinMaxDateTester $tester)
    {
        parent::__construct($msg);
        $this->setValTester($tester);
    }

    /**
     * getValTester
     * @return MinMaxDateTester
     */
    public function getValTester(): MinMaxDateTester
    {
        return $this->valTester;
    }

    /**
     * setValTester
     * @param MinMaxDateTester $tester
     */
    public function setValTester(MinMaxDateTester $tester): void
    {
        $this->valTester = $tester;
    }

    /**
     * setMsgContent
     */
    protected function setMsgContent(): void
    {
        $msgId = 'invalid_min_max_date';
        $msgParameters = ['min' => $this->valTester->getMin(), 'max' => $this->valTester->getMax()];
        $domain = 'Validator';
        $this->getMsg()->setContent($domain, $msgId, $msgParameters);
    }

    /**
     * testValue
     * @param DateTime $data
     * @return bool
     */
    protected function testValue(mixed $data): bool
    {
        return $this->valTester->testValue($data);
    }
}
