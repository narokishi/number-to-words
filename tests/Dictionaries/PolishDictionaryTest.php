<?php
declare(strict_types=1);

namespace Narokishi\Tests\Dictionaries;

use Narokishi\NumberToWords\Dictionaries\PolishDictionary;
use Narokishi\Tests\TestCase;

/**
 * Class PolishDictionaryTest
 * @package Narokishi\Tests\Dictionaries
 */
class PolishDictionaryTest extends TestCase
{
    /**
     * @var PolishDictionary
     */
    protected $dictionaryClass;

    public function setUp(): void
    {
        $this->dictionaryClass = new PolishDictionary;
    }

    /**
     * @return array
     */
    public function validVarietyDataProvider(): array
    {
        return [
            [0, 2],
            [1, 0],
            [2, 1],
            [3, 1],
            [4, 1],
            [5, 2],
            [13, 2],
            [23, 1],
            [101, 2],
        ];
    }

    /**
     * @return array
     */
    public function invalidVarietyDataProvider(): array
    {
        return [
            [0, 1],
            [7, 1],
            [13, 1],
            [101, 0],
        ];
    }

    /**
     * @return array
     */
    public function dictionaryDataProvider(): array
    {
        return [
            ['getUnit', 1, 'jeden'],
            ['getTeen', 8, 'osiemnaście'],
            ['getTen', 7, 'siedemdziesiąt'],
            ['getHundred', 3, 'trzysta'],
        ];
    }

    /**
     * @dataProvider validVarietyDataProvider
     *
     * @param int $number
     * @param int $validVariety
     */
    public function testValidVarieties(int $number, int $validVariety): void
    {
        $this->assertSame(
            $validVariety,
            $this->dictionaryClass->getVariety($number)
        );
    }

    /**
     * @dataProvider invalidVarietyDataProvider
     *
     * @param int $number
     * @param int $invalidVariety
     */
    public function testInvalidVarieties(int $number, int $invalidVariety): void
    {
        $this->assertNotSame(
            $invalidVariety,
            $this->dictionaryClass->getVariety($number)
        );
    }

    public function testNotEmptyZero(): void
    {
        $this->assertNotEmpty(
            $this->dictionaryClass->getZero()
        );
    }

    /**
     * @dataProvider dictionaryDataProvider
     *
     * @param string $method
     * @param int $position
     * @param string $validWord
     */
    public function testGetFromDictionary(string $method, int $position, string $validWord): void
    {
        $this->assertSame(
            $validWord,
            $this->dictionaryClass->$method($position)
        );
    }
}
