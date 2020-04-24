<?php
declare(strict_types=1);

namespace Narokishi\Tests\Transformers;

use Narokishi\NumberToWords\Transformers\PolishTransformer;
use Narokishi\Tests\TestCase;

/**
 * Class PolishTransformerTest
 * @package Narokishi\Tests\Transformers
 */
class PolishTransformerTest extends TestCase
{
    /**
     * @var PolishTransformer
     */
    protected $transformerClass;

    protected function setUp(): void
    {
        $this->transformerClass = new PolishTransformer;
    }

    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            [742.37, 'PLN', 'siedemset czterdzieści dwa złote trzydzieści siedem groszy'],
            [102.15, 'PLN', 'sto dwa złote piętnaście groszy'],
            [0, 'PLN', 'zero złotych zero groszy'],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        return [
            [142.07, 'PLN', 'sto czterdzieści dwa złote zero groszy'],
            [1047.09, 'PLN', 'czterdzieści siedem złotych dziewięć groszy'],
            [0, 'PLN', 'zero'],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param float $number
     * @param string $currency
     * @param string $validOutput
     */
    public function testFromValidData(float $number, string $currency, string $validOutput): void
    {
        $this->assertSame(
            $validOutput,
            $this->transformerClass->toWords($number, $currency)
        );
    }

    /**
     * @dataProvider invalidDataProvider
     *
     * @param float $number
     * @param string $currency
     * @param string $invalidOutput
     */
    public function testFromInvalidData(float $number, string $currency, string $invalidOutput): void
    {
        $this->assertNotSame(
            $invalidOutput,
            $this->transformerClass->toWords($number, $currency)
        );
    }
}
