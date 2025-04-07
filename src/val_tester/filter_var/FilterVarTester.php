<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\filter_var;

use pvc\interfaces\filtervar\FilterVarValidateInterface;
use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class FilterVarTester
 * @implements  ValTesterInterface<string>
 * filter_var is a php verb that can be used either to validate a string or to sanitize a string.  This object
 * wants to use filter_var for validation of course.
 */
class FilterVarTester implements ValTesterInterface
{
    public function __construct(FilterVarValidateInterface $filterVarValidate)
    {
        $this->setFilterVar($filterVarValidate);
    }

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
     * @param string $value
     * @return bool
     */
    public function testValue($value): bool
    {
        return $this->filterVar->validate($value);
    }
}
