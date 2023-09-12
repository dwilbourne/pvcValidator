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
     * @return RegexInterface|null
     */
    public function getRegex(): ?RegexInterface
    {
        return $this->regex ?? null;
    }

    /**
     * @function setRegex
     * @param RegexInterface $regex
     */
    public function setRegex(RegexInterface $regex): void
    {
        $this->regex = $regex;
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
        return ($this->getRegex() ? ['regex_label' => $this->regex->getLabel()] : []);
    }

    /**
     * validate
     * @param string $value
     * @return bool|null
     */
    public function testValue(mixed $value): bool|null
    {
        return $this->getRegex()?->match($value);
    }
}
