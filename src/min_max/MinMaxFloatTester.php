<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare(strict_types=1);

namespace pvc\validator\min_max;

/**
 * Class ValidatorMinMaxFloat
 * @extends MinMaxTester<float>
 */
class MinMaxFloatTester extends MinMaxTester
{
    /**
     * getMsgId
     * @return string
     */
    public function getMsgId(): string
    {
        return 'invalid_min_max_float';
    }

    /**
     * getLabel
     * @return string
     */
    public function getLabel(): string
    {
        return 'float';
    }

}
