<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator;

use pvc\interfaces\validator\ValTesterInterface;

/**
 * Class ValTester
 * @template DataType
 * @implements ValTesterInterface<DataType>
 */
abstract class ValTester implements ValTesterInterface
{
    /**
     * @var string
     */
    protected string $msgId = '';

    /**
     * @var array<string, mixed>
     */
    protected array $msgParameters = [];

    /**
     * getMsgId
     * @return string
     */
    public function getMsgId(): string
    {
        return $this->msgId;
    }

    /**
     * setMsgId
     * @param string $msgId
     */
    public function setMsgId(string $msgId): void
    {
        $this->msgId = $msgId;
    }

    /**
     * getMsgParameters
     * @return array|mixed[]
     */
    public function getMsgParameters(): array
    {
        return $this->msgParameters;
    }

    /**
     * setMsgParameters
     * @param array<string, mixed> $params
     */
    public function setMsgParameters(array $params): void
    {
        foreach ($params as $key => $param) {
            $this->addMsgParameter($key, $param);
        }
    }

    /**
     * addMsgParameter
     * @param string $paramName
     * $paramName looks like it could be typed as array-index, but because it is specifically for pvc messages, it
     * must be a string.  It is used as a variable name in the message text within the pvcMsg library.
     * @param mixed $paramValue
     */
    public function addMsgParameter(string $paramName, mixed $paramValue): void
    {
        $this->msgParameters[$paramName] = $paramValue;
    }
}
