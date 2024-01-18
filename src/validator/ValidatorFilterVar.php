<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\validator;

use pvc\interfaces\filtervar\FilterVarValidateInterface;
use pvc\interfaces\msg\MsgInterface;
use pvc\validator\Validator;

/**
 * Class ValidatorFilterVar
 * @extends Validator<string>
 */
class ValidatorFilterVar extends Validator
{
    /**
     * @var FilterVarValidateInterface
     */
    protected FilterVarValidateInterface $valTester;

    /**
     * @param MsgInterface $msg
     * @param FilterVarValidateInterface $valTester
     */
    public function __construct(MsgInterface $msg, FilterVarValidateInterface $valTester)
    {
        parent::__construct($msg);
        $this->setValTester($valTester);
    }

    /**
     * setMsgContent
     */
    protected function setMsgContent(): void
    {
        $msgId = 'filter_var_test_failed';
        $msgParameters = ['label' => $this->getValTester()->getLabel()];
        $domain = 'Validator';
        $this->getMsg()->setContent($msgId, $msgParameters, $domain);
    }

    /**
     * getValTester
     * @return FilterVarValidateInterface
     */
    public function getValTester(): FilterVarValidateInterface
    {
        return $this->valTester;
    }

    /**
     * setValTester
     * @param FilterVarValidateInterface $tester
     */
    public function setValTester(FilterVarValidateInterface $tester): void
    {
        $this->valTester = $tester;
    }

    /**
     * testValue
     * @param string $data
     * @return bool
     */
    protected function testValue(mixed $data): bool
    {
        return $this->getValTester()->validate($data);
    }
}
