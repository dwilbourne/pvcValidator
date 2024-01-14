<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\list_choice;

use pvc\validator\err\InvalidLabelException;
use pvc\validator\ValTester;

/**
 * Class ListChoiceValTester
 */
class ListChoiceValTester extends ValTester
{
    /**
     * @var array<mixed>
     */
    protected $choices = [];

    protected string $label;

    public function setChoices(array $choices): void
    {
        $this->choices = $choices;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }

    public function testValue(mixed $value): bool
    {
        /** use the strict parameter set to true - see in_array documentation for why */
        return in_array($value, $this->choices, true);
    }

    public function setLabel(string $label): void
    {
        if (empty($label)) {
            throw new InvalidLabelException();
        }
        $this->label = $label;
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}