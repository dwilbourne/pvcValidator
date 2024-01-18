<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\min_max;

use pvc\interfaces\validator\ValTesterInterface;
use pvc\validator\err\SetMaxException;
use pvc\validator\err\SetMinException;

/**
 * Class MinMaxTester
 * @template DataType
 * @implements ValTesterInterface<DataType>
 */
abstract class MinMaxTester implements ValTesterInterface
{
    /**
     * @var DataType
     */
    protected $min;

    /**
     * @var DataType
     */
    protected $max;

    /**
     * @return DataType|null
     */
    public function getMin(): mixed
    {
        return $this->min ?? null;
    }

    /**
     * @param DataType $min
     * @throws SetMinException
     */
    public function setMin(mixed $min): void
    {
        /**
         * $min cannot be null
         */
        if (is_null($min)) {
            throw new SetMinException();
        }
        /**
         * if max is set, min must be less than max
         */
        if (isset($this->max) && $min > $this->max) {
            throw new SetMinException();
        }
        $this->min = $min;
    }

    /**
     * @return DataType|null
     */
    public function getMax(): mixed
    {
        return $this->max ?? null;
    }

    /**
     * @param DataType $max
     * @throws SetMaxException
     */
    public function setMax($max): void
    {
        if (is_null($max)) {
            throw new SetMaxException();
        }
        if (isset($this->min) && ($max < $this->min)) {
            throw new SetMaxException();
        }
        $this->max = $max;
    }

    /**
     * setMinMax
     * @param DataType $min
     * @param DataType $max
     * @throws SetMaxException
     * @throws SetMinException
     */
    public function setMinMax($min, $max): void
    {
        $this->setMin($min);
        $this->setMax($max);
    }

    /**
     * validate
     * @param DataType $value
     * @return bool
     */
    public function testValue($value): bool
    {
        return ($value >= $this->getMin()) && ($value <= $this->getMax());
    }
}
