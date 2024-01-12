<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\ctype;

use pvc\validator\err\InvalidLabelException;
use pvc\validator\ValTester;

/**
 * Class CTypeTester
 * @extends ValTester<string>
 */
abstract class CTypeTester extends ValTester
{
    /**
     * @var string
     */
    protected string $label;

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
}
