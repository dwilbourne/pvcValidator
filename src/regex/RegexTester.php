<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare(strict_types=1);

namespace pvc\validator\regex;

use pvc\interfaces\regex\RegexInterface;
use pvc\interfaces\validator\ValTesterInterface;

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
     * getMsgId
     * @return string
     */
    public function getMsgId(): string
    {
        return 'regex_test_failed';
    }

    /**
     * getMsgParameters
     * @return array<string>
     */
    public function getMsgParameters(): array
    {
        return ($this->getRegex()->getLabel() ? ['regex_label' => $this->regex->getLabel()] : []);
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
        $this->getRegex()->setLabel($label);
        return $this;
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
     * validate
     * @param string $value
     * @return bool|null
     */
    public function testValue(mixed $value): bool|null
    {
        return $this->getRegex()->match($value);
    }
}
