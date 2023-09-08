<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\min_max;

use pvc\interfaces\validator\val_tester\ValTesterMinMaxInterface;
use pvc\validator\err\SetMaxException;
use pvc\validator\err\SetMinException;

/**
 * Class ValidatorMinMax
 * @template DataType
 * @implements ValTesterMinMaxInterface<DataType>
 */
abstract class MinMaxTester implements ValTesterMinMaxInterface
{
    /**
     * @var DataType
     */
    protected $min;

    /**
     * @var DataType
     */
    protected $max;

    public function __construct(mixed $min, mixed $max)
    {
        $this->setMin($min);
        $this->setMax($max);
    }

    /**
     * getMsgId
     * wording and formatting of the messages depends on the data type of the value that is being validated
     * @return string
     */
    public function getMsgId(): string
    {
        return '';
    }

    /**
     * getMsgParameters
     * @return array|mixed[]
     */

    public function getMsgParameters(): array
    {
        return ['min' => $this->getMin(), 'max' => $this->getMax()];
    }

    /**
     * @return DataType
     */
    public function getMin(): mixed
    {
        return $this->min;
    }

    /**
     * @param DataType $min
     * @throws \pvc\validator\err\SetMinException
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
     * @return DataType
     */
    public function getMax(): mixed
    {
        return $this->max;
    }

    /**
     * @param DataType $max
     * @throws \pvc\validator\err\SetMaxException
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
     * validate
     * @param DataType $value
     * @return bool
     */
    public function testValue($value): bool
    {
        return ($value >= $this->getMin()) && ($value <= $this->getMax());
    }
}
