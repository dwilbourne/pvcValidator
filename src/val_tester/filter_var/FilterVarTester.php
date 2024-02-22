<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\filter_var;

use pvc\interfaces\filtervar\FilterVarValidateInterface;
use pvc\interfaces\validator\ValTesterInterface;
use pvc\validator\err\InvalidLabelException;

/**
 * Class ValidatorText
 * @implements  ValTesterInterface<string>
 */
class FilterVarTester implements ValTesterInterface
{
    /**
     * @var FilterVarValidateInterface
     */
    protected FilterVarValidateInterface $filterVar;

    /**
     * getFilterVar
     * @return FilterVarValidateInterface
     */
    public function getFilterVar(): FilterVarValidateInterface
    {
        return $this->filterVar;
    }

    /**
     * setFilterVar
     * @param FilterVarValidateInterface $filterVar
     * @return $this
     */
    public function setFilterVar(FilterVarValidateInterface $filterVar): FilterVarTester
    {
        $this->filterVar = $filterVar;
        return $this;
    }

    /**
     * setFilter
     * @param int $filter
     * @return $this
     */
    public function setFilter(int $filter): FilterVarTester
    {
        $this->getFilterVar()->setFilter($filter);
        return $this;
    }

    /**
     * getFilter
     * @return int
     */
    public function getFilter(): int
    {
        return $this->getFilterVar()->getFilter();
    }

    /**
     * setLabel
     * @param string $label
     * @return $this
     * @throws InvalidLabelException
     */
    public function setLabel(string $label): FilterVarTester
    {
        if (empty($label)) {
            throw new InvalidLabelException();
        }
        $this->getFilterVar()->setLabel($label);
        return $this;
    }

    /**
     * getLabel
     * @return string
     */
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

    /**
     * addFlag
     * @param int $filterFlag
     * @return $this
     */
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
