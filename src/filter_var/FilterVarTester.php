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

    public function getMsgId(): string
    {
        return 'filter_var_test_failed';
    }

    public function getMsgParameters(): array
    {
        return ['filter_var_label' => $this->getLabel()];
    }

    public function getLabel(): string
    {
        return $this->filterVar->getLabel();
    }

    public function setLabel(string $label): FilterVarTester
    {
        if (empty($label)) {
            throw new InvalidLabelException();
        }
        $this->filterVar->setLabel($label);
        return $this;
    }

    public function setFilter(int $filter): FilterVarTester
    {
        $this->getFilterVar()->setFilter($filter);
        return $this;
    }

    public function getFilterVar(): FilterVarValidate
    {
        return $this->filterVar;
    }

    public function setFilterVar(FilterVarValidate $filterVar): FilterVarTester
    {
        $this->filterVar = $filterVar;
        return $this;
    }

    public function getFilter(): int
    {
        return $this->getFilterVar()->getFilter();
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
