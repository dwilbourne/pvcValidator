<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\val_tester\parser;

use pvc\interfaces\parser\ParserInterface;
use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class ParserTester
 * @implements ValTesterInterface<string>
 */
class ParserTester implements ValTesterInterface
{
    /**
     * @var ParserInterface
     */
    protected ParserInterface $parser;

    public function __construct(ParserInterface $parser)
    {
        $this->setParser($parser);
    }

    /**
     * testValue
     * @param string $value
     * @return bool
     */
    public function testValue(mixed $value): bool
    {
        return $this->getParser()->parse($value);
    }

    /**
     * getParser
     * @return ParserInterface
     */
    public function getParser(): ParserInterface
    {
        return $this->parser;
    }

    /**
     * setParser
     * @param ParserInterface $parser
     */
    public function setParser(ParserInterface $parser): void
    {
        $this->parser = $parser;
    }
}
