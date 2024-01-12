<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\callable;

use pvc\validator\err\InvalidLabelException;
use pvc\validator\ValTester;

/**
 * Class CallableTester
 * @extends ValTester<mixed>
 */
class CallableTester extends ValTester
{

    /**
     * @var string
     */
    protected string $label;

    /**
     * @var callable|null
     */
    protected $callable;

    /**
     * getLabel
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * setLabel
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        if (empty($label)) {
            throw new InvalidLabelException();
        }
        $this->label = $label;
    }

    /**
     * testValue
     * @param $value
     * @return bool
     */
    public function testValue($value): bool
    {
        $callable = $this->getCallable();
        return (bool)$callable($value);
    }

    /**
     * getCallable
     * @return callable
     */
    public function getCallable(): callable
    {
        $default = function (mixed $value) {
            return true;
        };
        return ($this->callable ?? $default);
    }

    /**
     * setCallable
     * @param callable $callable
     */
    public function setCallable(callable $callable): void
    {
        $this->callable = $callable;
    }
}
