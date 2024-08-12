<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\list_choice;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class ListChoiceValTester
 * @implements ValTesterInterface<mixed>
 */
class ListChoiceTester implements ValTesterInterface
{
    /**
     * @var array<mixed>
     */
    protected $choices = [];

    /**
     * setChoices
     * @param array<mixed> $choices
     */
    public function setChoices(array $choices): void
    {
        $this->choices = $choices;
    }

    /**
     * getChoices
     * @return mixed[]
     */
    public function getChoices(): array
    {
        return $this->choices;
    }

    /**
     * testValue
     * @param mixed $value
     * @return bool
     */
    public function testValue(mixed $value): bool
    {
        /** use the strict parameter set to true - see in_array documentation for why */
        return in_array($value, $this->choices, true);
    }
}
