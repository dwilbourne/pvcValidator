<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare (strict_types=1);

namespace pvc\validator\messages;

return [
    'not_null' => "value cannot be null",
    'invalid_min_max_date' => "value is not between {'min', date, short} and {'max'}, date, short}",
    'invalid_min_max_time' => "value is not between {'min', time, short} and {'max'}, time, short}",
    'invalid_min_max_float' => "value is not between {'min', number, float} and {'max', number, float}",
    'invalid_min_max_integer' => "value is not between {'min', number, integer} and {'max', number, integer}",
    'invalid_email' => "value is not a valid email address.",
    'invalid_url' => "value is not a valid url",
    'regex_test_failed' => "value is not a valid {regex_label}",
    'not_alnum' => "value is not a letter or a number",
];
