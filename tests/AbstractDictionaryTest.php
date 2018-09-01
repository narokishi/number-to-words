<?php
declare(strict_types=1);

namespace Narokishi\Tests;

use Narokishi\NumberToWords\AbstractDictionary;

/**
 * Class AbstractDictionaryTest
 * @package Narokishi\Tests
 */
class AbstractDictionaryTest extends TestCase
{
    /**
     * @var AbstractDictionary
     */
    protected $dictionaryClass;

    /**
     * @throws \ReflectionException
     */
    public function setUp(): void
    {
        $this->dictionaryClass = $this->getMockForAbstractClass(AbstractDictionary::class);
    }

    /**
     * @return array
     */
    public function validDataProvider(): array
    {
        return [
            [0], [1], [2],
            [3], [4], [5],
            [6], [7], [8],
            [9],
        ];
    }

    /**
     * @dataProvider validDataProvider
     *
     * @param int $amount
     */
    public function testReturnedValues(int $amount): void
    {
        $this->assertEmpty(
            $this->dictionaryClass->getUnit($amount)
        );
        $this->assertEmpty(
            $this->dictionaryClass->getTeen($amount)
        );
        $this->assertEmpty(
            $this->dictionaryClass->getTen($amount)
        );
        $this->assertEmpty(
            $this->dictionaryClass->getHundred($amount)
        );
        $this->assertEmpty(
            $this->dictionaryClass->getExponent(0, $amount)
        );
        $this->assertEmpty(
            $this->dictionaryClass->getCurrency($amount, 'Abstract Currency')
        );
        $this->assertNotEmpty(
            $this->dictionaryClass->getSeparator()
        );
    }
}
