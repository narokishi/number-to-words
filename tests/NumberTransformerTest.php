<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\NumberToWords\LanguageConst;
use Narokishi\NumberToWords\NumberTransformer;
use Narokishi\NumberToWords\Transformers\PolishTransformer;

/**
 * Class NumberTransformerTest
 * @package Narokishi\Tests
 */
class NumberTransformerTest extends TestCase
{
    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            ['PL', PolishTransformer::class],
        ];
    }

    /**
     * @return array
     */
    public function invalidDataProvider(): array
    {
        return [
            ['PLN'],
            ['Poland'],
            ['Abstract Country'],
        ];
    }

    /**
     * @return array
     */
    public function constantsDataProvider(): array
    {
        return [
            [LanguageConst::LANGUAGES],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param string $language
     * @param string $expectedClass
     */
    public function testSetFromValidData(string $language, string $expectedClass): void
    {
        $transformer = NumberTransformer::make()
            ->setLanguage($language);

        $this->assertInstanceOf($expectedClass, $transformer);
    }

    /**
     * @dataProvider invalidDataProvider
     * @expectedException \LogicException
     *
     * @param string $language
     */
    public function testSetFromInvalidData(string $language): void
    {
        NumberTransformer::make()
            ->setLanguage($language);
    }

    /**
     * @dataProvider constantsDataProvider
     *
     * @param array $array
     */
    public function testSetFromConstants(array $array): void
    {
        foreach ($array as $language => $expectedClass) {
            $transformer = NumberTransformer::make()
                ->setLanguage($language);

            $this->assertInstanceOf($expectedClass, $transformer);
        }

        $this->assertNotEmpty($array);
    }
}
