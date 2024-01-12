<?php
/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

namespace pvcTests\validator\ctype;

use pvc\validator\ctype\CTypeTesterAlphaNumeric;
use pvcTests\validator\ValTesterTest;

class CTypeTesterAlphaNumericTest extends ValTesterTest
{
    public function setUp(): void
    {
        $this->tester = new CTypeTesterAlphaNumeric();
    }

    /**
     * @dataProvider dataProvider
     * @param string $string
     * @param bool $expectedResult
     * @covers \pvc\validator\ctype\CTypeTesterAlphaNumeric::testValue
     */
    public function testValidatorSuccess(string $string, bool $expectedResult): void
    {
        self::assertEquals($expectedResult, $this->tester->testValue($string));
    }

    public function dataProvider(): array
    {
        $e_with_acute = "\u{00E9}";
        $snowman = "\u{2603}";

        return [
            'lower case' => ['assgogdf', true, 'failed lower case test'],
            'upper case' => ['EUIRYOIUY', true, 'failed uypper case test'],
            'mixed case' => ['UhRfTlkOP', true, 'failed mixed case test'],
            'some numbers OK' => ['UhUhio873HYjl', true, 'failed some numbers OK test'],
            'only numbers OK' => ['18793648379', true, 'failed only numbers OK test'],
            'punctuation' => ['UhgIhhiHGGF&*%)', false, 'failed punctuation test'],
            'whitespace' => ['  hiHGGF&*%)', false, 'failed whitespace test'],
            'french_accented_e' => [$e_with_acute, false, 'failed accented e test'],
            'snowman' => [$snowman, false, 'failed snowman test'],
        ];
    }
}
