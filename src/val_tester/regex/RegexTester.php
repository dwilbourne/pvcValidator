<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\val_tester\regex;

use pvc\interfaces\regex\RegexInterface;
use pvc\interfaces\validator\ValTesterInterface;
use pvc\validator\err\InvalidLabelException;

/**
 * Class ValidatorRegex
 * @implements ValTesterInterface<string>
 */
class RegexTester implements ValTesterInterface
{
    /**
     * @var RegexInterface
     */
    protected RegexInterface $regex;

    public function __construct(RegexInterface $regex)
    {
        $this->setRegex($regex);
    }

    /**
     * getLabel
     * @return string
     */
    public function getLabel(): string
    {
        return $this->getRegex()->getLabel();
    }

    /**
     * @return RegexInterface
     */
    public function getRegex(): RegexInterface
    {
        return $this->regex;
    }

    /**
     * @function setRegex
     * @param RegexInterface $regex
     */
    public function setRegex(RegexInterface $regex): RegexTester
    {
        $this->regex = $regex;
        return $this;
    }

    /**
     * setPattern
     * @param string $pattern
     */
    public function setPattern(string $pattern): RegexTester
    {
        $this->getRegex()->setPattern($pattern);
        return $this;
    }

    /**
     * getPattern
     * @return string
     */
    public function getPattern(): string
    {
        return $this->getRegex()->getPattern();
    }

    /**
     * setLabel
     * @param string $label
     */
    public function setLabel(string $label): RegexTester
    {
        if (empty($label)) {
            throw new InvalidLabelException();
        }
        $this->getRegex()->setLabel($label);
        return $this;
    }

    /**
     * validate
     * @param string $value
     * @return bool
     */
    public function testValue(mixed $value): bool
    {
        return $this->getRegex()->match($value);
    }
}
