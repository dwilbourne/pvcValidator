<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\callable;

use pvc\interfaces\validator\valtesters\ValTesterCallableInterface;

/**
 * Class CallableTester
 * @template DateType
 * @implements  ValTesterCallableInterface<DateType>
 */
class CallableTester implements ValTesterCallableInterface
{
    /**
     * @var callable|null
     */
    protected $callable;

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
        /** @phpcs noinspection */
        $default = function (mixed $value) { return true; };
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
