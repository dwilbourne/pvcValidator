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
     * RegexTester constructor.
     * @param RegexInterface $regex
     */
    public function __construct(RegexInterface $regex)
    {
        $this->setRegex($regex);
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
     * @return array|mixed[]
     */
    public function getMsgParameters(): array
    {
        return ['regex_label' => $this->regex->getLabel()];
    }

    /**
     * validate
     * @param string $value
     * @return bool
     */
    public function testValue(mixed $value): bool
    {
        return $this->regex->match($value);
    }
}
