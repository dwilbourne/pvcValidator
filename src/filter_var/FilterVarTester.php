<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\filter_var;

use pvc\interfaces\validator\val_tester\ValTesterStringInterface;
use pvc\validator\err\UnsetFilterException;

/**
 * Class ValidatorText
 */
abstract class FilterVarTester implements ValTesterStringInterface
{
    /**
     * @var int
     */
    protected int $filter;

    /**
     * @var array<string, array<mixed>>
     */
    protected array $optionsArray = [
        'options' => [],
        'flags' => [],
    ];

    /**
     * @param int $filter
     */
    public function __construct(int $filter)
    {
        $this->setFilter($filter);
    }

    /**
     * addOption
     * @param string $filterVarOption
     */
    public function addOption(string $filterVarOption, mixed $value): void
    {
        $this->optionsArray['options'][$filterVarOption] = $value;
    }

    public function addFlag(string $filterFlag): void
    {
        $this->optionsArray['flags'][] = $filterFlag;
    }

    abstract public function getMsgId(): string;

    public function getMsgParameters(): array
    {
        return [];
    }

    /**
     * @function testValue
     * @param string $value
     * @return bool
     */
    public function testValue(mixed $value = ''): bool
    {
        return (false !== filter_var($value, $this->getFilter(), $this->getOptionsArray()));
    }

    /**
     * @function getFilter
     * @return int
     */
    public function getFilter(): int
    {
        return $this->filter;
    }

    /**
     * @function setFilter
     * @param int $filter
     */
    public function setFilter(int $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * @function getOptionsArray
     * @return array<string, mixed>
     */
    public function getOptionsArray(): array
    {
        return $this->optionsArray;
    }
}
