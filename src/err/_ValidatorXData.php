<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 * @noinspection PhpCSValidationInspection
 */
declare(strict_types=1);

namespace pvc\validator\err;

use pvc\err\XDataAbstract;

/**
 * Class _ValidatorXData
 */
class _ValidatorXData extends XDataAbstract
{

    public function getLocalXCodes(): array
    {
        return [
            SetMinException::class => 1001,
            SetMaxException::class => 1002,
            InvalidLabelException::class => 1003,
        ];
    }

    public function getXMessageTemplates(): array
    {
        return [
            SetMinException::class => 'min cannot be null and cannot set min value to be greater than existing max value.',
            SetMaxException::class => 'max cannot be null and cannot set max value to be less than existing min value.',
            InvalidLabelException::class => 'label cannot be an empty string',
        ];
    }
}