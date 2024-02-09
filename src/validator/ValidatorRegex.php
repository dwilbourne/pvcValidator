<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\validator;

use pvc\interfaces\msg\MsgInterface;
use pvc\validator\val_tester\regex\RegexTester;
use pvc\validator\Validator;

/**
 * Class ValidatorRegex
 * @extends Validator<string>
 */
class ValidatorRegex extends Validator
{
    /**
     * @var RegexTester
     */
    protected RegexTester $regexTester;

    /**
     * @param MsgInterface $msg
     * @param RegexTester $regexTester
     */
    public function __construct(MsgInterface $msg, RegexTester $regexTester)
    {
        parent::__construct($msg);
        $this->setRegexTester($regexTester);
    }

    /**
     * getRegexTester
     * @return RegexTester
     */
    public function getRegexTester(): RegexTester
    {
        return $this->regexTester;
    }

    /**
     * setRegexTester
     * @param RegexTester $regexTester
     */
    public function setRegexTester(RegexTester $regexTester): void
    {
        $this->regexTester = $regexTester;
    }

    /**
     * setMsgContent
     */
    protected function setMsgContent(): void
    {
        $msgId = 'regex_test_failed';
        $msgParameters = ['regex_label' => $this->regexTester->getLabel()];
        $domain = 'Validator';
        $this->getMsg()->setContent($domain, $msgId, $msgParameters);
    }

    /**
     * testValue
     * @param string $data
     * @return bool
     */
    protected function testValue(mixed $data): bool
    {
        return $this->regexTester->testValue($data);
    }
}