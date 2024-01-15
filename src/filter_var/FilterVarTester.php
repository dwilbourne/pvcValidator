<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\filter_var;

use pvc\filtervar\FilterVarValidate;
use pvc\validator\err\InvalidLabelException;
use pvc\validator\ValTester;

/**
 * Class ValidatorText
 * @extends ValTester<string>
 */
class FilterVarTester extends ValTester
{

    protected FilterVarValidate $filterVar;

    public function __construct()
    {
        $this->setMsgId('filter_var_test_failed');
    }

    public function setFilter(int $filter): FilterVarTester
    {
        $this->getFilterVar()->setFilter($filter);
        return $this;
    }

    public function getFilter(): int
    {
        return $this->getFilterVar()->getFilter();
    }

    public function getFilterVar(): FilterVarValidate
    {
        return $this->filterVar;
    }

    public function setFilterVar(FilterVarValidate $filterVar): FilterVarTester
    {
        $this->filterVar = $filterVar;
        $this->setMsgParameters([]);
        $this->addMsgParameter('filter_var_label', $this->filterVar->getLabel());
        return $this;
    }

    public function setLabel(string $label): FilterVarTester
    {
        if (empty($label)) {
            throw new InvalidLabelException();
        }
        $this->getFilterVar()->setLabel($label);
        return $this;
    }

    public function getLabel(): string
    {
        return $this->getFilterVar()->getLabel();
    }

    /**
     * addOption
     * @param string $filterVarOption
     */
    public function addOption(string $filterVarOption, mixed $value): FilterVarTester
    {
        $this->filterVar->addOption($filterVarOption, $value);
        return $this;
    }

    public function addFlag(int $filterFlag): FilterVarTester
    {
        $this->filterVar->addFlag($filterFlag);
        return $this;
    }

    /**
     * @function testValue
     * @param string $value
     * @return bool
     */
    public function testValue(mixed $value = ''): bool
    {
        return $this->getFilterVar()->validate($value);
    }
}
